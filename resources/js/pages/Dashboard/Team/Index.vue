<script setup>
import Modal from '@/components/Modal.vue'
import {ref, onMounted} from 'vue';
import useAxios from "@/composables/useAxios.js";
import {toast} from "vue3-toastify";

const {loading, error, sendRequest} = useAxios();

const members = ref(null);
const getMembers = async () => {
    const response = await sendRequest({
        method: 'get',
        url:'/v1/team-member',
    });
    if(response){
        members.value = response.data;
    }
}

//handle file upload
const photo = ref(null);
const handleFileChange = (image) => {
    const file = image.target.files[0];
    form.value.photo = file;
    member.value.photo = file;
    photo.value = URL.createObjectURL(file);
}

const form  = ref({
    name:null,
    photo:null,
    position:null,
    order_number:null,
    intro:null,
})

const onSubmit = async () => {
    const response = await sendRequest({
        method:'post',
        url:'/v1/team-member',
        data:form.value,
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    });

    if(response){
        toast.success('A New Team Member Added Successfully', {autoClose:500, 'theme' : 'dark'})
        await getMembers();
        closeModal();
    }
}

const member  = ref(null);
const editMember = (mem) => {
    member.value = mem;
    photo.value = mem.photo;
    isEditModalOpened.value = true;
}

const onUpdate = async (id) => {
    const response = await sendRequest({
        method:'post',
        url:`/v1/team-member/${id}`,
        data:member.value,
        params: {
            _method:'PUT'
        }
    });
    if(response){
        toast.success('Team Member Updated Successfully', {autoClose:500, 'theme' :'dark'});
        getMembers();
        closeModal();
    }
}

const handelDelete = async (id) => {
    const response = await sendRequest({
        method:'delete',
        url:`/v1/team-member/${id}`
    });
    if(response){
        toast.success('A Member Deleted Successfully', {autoClose:500, 'theme': 'dark'});
        await getMembers();
    }
}

const reset = () => {
    form.value.name = null;
    form.value.position = null;
    form.value.order_number = null;
    form.value.photo = null;
    form.value.intro = null;
    photo.value = null;
}

// model
const isModalOpened = ref(false);
const isEditModalOpened = ref(false);

const openModal = () => {
    isModalOpened.value = true;
};
const closeModal = () => {
    isModalOpened.value = false;
    isEditModalOpened.value = false;
    reset();
};

onMounted(() => {
    getMembers();
})
</script>
<template>
    <AppLayout>
        <div class="flex items-center justify-between p-5 bg-secondary">
            <div>
                <div class="flex items-center">
                    <h2 class="text-xl py-5 px-3">Team Members</h2>
                </div>
                <div>
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative mt-1">
                        <div
                            class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="text" id="table-search" v-model="search" class="w-80 rounded block pt-2 ps-10 text-sm  border border-gray-500 bg-transparent
                          focus:ring-primary focus:border-primary text-gray-300 shadow" placeholder="Search for items">
                    </div>
                </div>
            </div>

            <button
                @click="openModal"
                class="flex items-center justify-center gap-2 bg-primary px-3 py-2 text-white text-sm font-medium">
                <Icon name="streamline:interface-add-circle-button-remove-cross-add-buttons-plus-circle"
                      class="text-sm shadow-lg border-primary"/>
                Add Record
            </button>
        </div>
        <div class="relative overflow-x-auto bg-secondary">
            <table class="w-full text-left rtl:text-right">
                <thead class="text-white uppercase bg-gray-800">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Photo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        name
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Position
                    </th>
                    <th scope="col" class="px-6 py-3">
                        action
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="border-b border-gray-500 hover:bg-gray-600" v-for="item in members?.data">
                    <td class="p-2">
                        <img class="w-20 h-20" :src="item?.photo" alt="">
                    </td>
                    <td class="px-6 py-4 text-sm">
                        {{ item?.name}}
                    </td>
                    <td class="px-6 py-4">
                        {{ item?.position }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-3">
                            <button @click="editMember(item)">
                                <Icon name="material-symbols-light:edit-square-outline"
                                      class="text-green-500 text-2xl"/>
                            </button>
                            <button @click="handelDelete(item.id)">
                                <Icon name="material-symbols:delete-outline-rounded"
                                      class="text-red-500 text-2xl"/>
                            </button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </AppLayout>

    <Modal title="Create New Category" :isOpen="isModalOpened" @modal-close="closeModal">
        <div class="flex flex-wrap pt-5">
            <div class="w-full mb-4">
                <label for="name" class="block mb-1 text-xs font-normal">Member Name</label>
                <input v-model="form.name" type="text" class="p-2 rounded border border-primary w-full bg-transparent">
            </div>
            <div class="w-full mb-4">
                <label for="name" class="block mb-1 text-xs font-normal">Member Position</label>
                <input v-model="form.position" type="text" class="p-2 rounded border border-primary w-full  bg-transparent">
            </div>
            <div class="w-full mb-4">
                <label for="name" class="block mb-1 text-xs font-normal">Order Number</label>
                <input v-model="form.order_number" type="number" class="p-2 rounded border border-primary w-full  bg-transparent">
            </div>
            <div class="w-full mb-4">
                <label for="name" class="block mb-1 text-xs font-normal">Description</label>
                <textarea v-model="form.intro" class="p-2 rounded border border-primary w-full  bg-transparent"></textarea>
            </div>
            <div class="w-full mb-4">
                <div>
                    <label for="image" class="text-xs block mb-1">Member Photo</label>
                    {{ photo }}
                    <label for="cover_image" class="w-36 h-36 flex items-center
                        justify-center gap-3 p-2 border border-dashed border-primary rounded-md text-primary cursor-pointer">
                        <input type="file" id="cover_image" hidden @change="handleFileChange">
                        
                        <img v-if="photo" :src="photo" class="w-full h-full object-cover">
                        <div v-else>
                            <p class="text-xs">Upload Member Photo</p>
                        </div>
                    </label>
                </div>
            </div>
            <div class="w-full">
                <button @click="onSubmit" class="w-full bg-primary py-2.5">Save Member</button>
            </div>
        </div>
    </Modal>

    <Modal title="Update Category" :isOpen="isEditModalOpened" @modal-close="closeModal">
        <div class="flex flex-wrap pt-5">
            <div class="w-full mb-4">
                <label for="name" class="block mb-1 text-xs font-normal">Member Name</label>
                <input v-model="member.name" type="text" class="p-2 rounded border border-primary w-full bg-transparent">
            </div>
            <div class="w-full mb-4">
                <label for="name" class="block mb-1 text-xs font-normal">Member Position</label>
                <input v-model="member.position" type="text" class="p-2 rounded border border-primary w-full  bg-transparent">
            </div>
            <div class="w-full mb-4">
                <label for="name" class="block mb-1 text-xs font-normal">Order Number</label>
                <input v-model="member.order_number" type="number" class="p-2 rounded border border-primary w-full  bg-transparent">
            </div>
            <div class="w-full mb-4">
                <label for="name" class="block mb-1 text-xs font-normal">Description</label>
                <textarea v-model="member.intro" class="p-2 rounded border border-primary w-full  bg-transparent"></textarea>
            </div>
            <div class="w-full mb-4">
                <div>
                    <label for="image" class="text-xs block mb-1">Member Photo</label>
                    <label for="cover_image" class="w-36 h-36 flex items-center
                        justify-center gap-3 p-2 border border-dashed border-primary rounded-md text-primary cursor-pointer">
                        <input type="file" id="cover_image" hidden @change="handleFileChange">
                        <img v-if="photo" :src="photo" class="w-full h-full object-cover">
                        <div v-else>
                            <p class="text-xs">Upload Member Photo</p>
                        </div>
                    </label>
                </div>
            </div>
            <div class="w-full">
                <button @click="onUpdate(member.id)" class="w-full bg-primary py-2.5">Update Member</button>
            </div>
        </div>
    </Modal>
</template>
