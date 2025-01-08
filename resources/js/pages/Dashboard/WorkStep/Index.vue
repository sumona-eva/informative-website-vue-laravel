<script setup>
import Modal from '@/components/Modal.vue'
import {ref, onMounted} from 'vue';
import useAxios from "@/composables/useAxios.js";
import {toast} from "vue3-toastify";
const {loading, error, sendRequest} = useAxios();

const steps = ref(null);
const getWorkSteps = async () => {
    const response = await sendRequest({
        method: 'get',
        url:'/v1/work-step',
    });
    if(response){
        steps.value = response.data;
    }
}



const form  = ref({
    name:null,
    description:null,
})

const onSubmit = async () => {
    const response = await sendRequest({
        method:'post',
        url:'/v1/work-step',
        data:form.value,
    });

    if(response){
        toast.success('Work Step Added Successfully', {autoClose:500, 'theme' : 'dark'})
        await getWorkSteps();
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
        getWorkSteps();
        closeModal();
    }
}

const handelDelete = async (id) => {
    const response = await sendRequest({
        method:'delete',
        url:`/v1/work-step/${id}`
    });
    if(response){
        toast.success('Work Step Deleted Successfully', {autoClose:500, 'theme': 'dark'});
        await getWorkSteps();
    }
}

const reset = () => {
    form.value.name = null;
    form.value.description = null;
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
    getWorkSteps();
})
</script>
<template>
    <AppLayout>
        <div class="flex items-center justify-between p-5 bg-secondary">
            <div>
                <div class="flex items-center">
                    <h2 class="text-xl py-5 px-3">Work Steps</h2>
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
            <div class="flex items-center flex-wrap border border-gray-700">
                <div class="w-1/2 border-r border-gray-700 relative p-4 border-b" v-for="step in steps?.data">
                    <div class="flex items-center gap-2 absolute top-2 right-2" >
                      
                       <IconButton @click="handelDelete(step?.id)" icon="solar:trash-bin-trash-linear" />
                    </div>
                    <h3 class="text-xl mb-2">{{ step?.title }}</h3>
                    <p class="text-base ">{{ step?.description }}</p>
                    <span class="text-sm font-normal text-gray-400 mt-4 block">Order Number {{ step?.order_number }}</span>
                </div>
            </div>
        </div>
    </AppLayout>

    <Modal title="Create A New Work Step" :isOpen="isModalOpened" @modal-close="closeModal">
        <div class="flex flex-wrap pt-5">
            <div class="w-full mb-4">
                <label for="name" class="block mb-1 text-xs font-normal">Title</label>
                <input v-model="form.title" type="text" class="p-2 rounded border border-primary w-full bg-transparent">
            </div>
            
            <div class="w-full mb-4">
                <label for="name" class="block mb-1 text-xs font-normal">Order Number</label>
                <input v-model="form.order_number" type="number" class="p-2 rounded border border-primary w-full  bg-transparent">
            </div>
            <div class="w-full mb-4">
                <label for="name" class="block mb-1 text-xs font-normal">Description</label>
                <textarea v-model="form.description" class="w-full h-20 p-2 rounded border border-primary bg-transparent focus:border-primary focus:ring-0"></textarea>
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
