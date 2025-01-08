<script setup>
import Modal from '@/components/Modal.vue'
import {ref, onMounted} from 'vue';
import useAxios from "@/composables/useAxios.js";
import {toast} from "vue3-toastify";

const {loading, error, sendRequest} = useAxios();

const items = ref(null);
const getItems = async () => {
    const response = await sendRequest({
        method: 'get',
        url:'/v1/trending',
    });
    if(response){
        items.value = response.data;
    }
}


//handle file upload
const bannerImg = ref(null);
const handleFileChange = (image) => {
    const file = image.target.files[0];
    form.value.image = file;
    bannerImg.value = URL.createObjectURL(file);
}

const form  = ref({
    url:null,
    image:null,
    order_number: null
})

const onSubmit = async () => {
    const response = await sendRequest({
        method:'post',
        url:'/v1/trending',
        data:form.value,
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    });

    if(response){
        toast.success('Trending Item Added Successfully', {autoClose:500, 'theme' : 'dark'})
        await getItems();
        closeModal();
    }
}

const handelDelete = async (id) => {
    const response = await sendRequest({
        method:'delete',
        url:`/v1/trending/${id}`
    });
    if(response){
        toast.success('Trending Item Deleted Successfully', {autoClose:500, 'theme': 'dark'});
        await getItems();
    }
}

const reset = () => {
    form.value.name = null;
    form.value.order_number = null;
}

// model
const isModalOpened = ref(false);
const isEditModalOpened = ref(false);

const openModal = () => {
    isModalOpened.value = true;
};
const closeModal = () => {
    isModalOpened.value = false;
    reset();
};

onMounted(() => {
    getItems();
})
</script>
<template>
    <AppLayout>
        <div class="flex items-center justify-between p-5 bg-secondary">
            <div>
                <div class="flex items-center">
                    <h2 class="text-xl py-5 px-3">Trending</h2>
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
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        url
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Order Number
                    </th>
                    <th scope="col" class="px-6 py-3">
                        action
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in items?.data">
                    <td class="p-2">
                        <img class="w-20 h-12" :src="item?.image" alt="">
                    </td>
                    <td class="px-6 py-4 text-sm">
                        {{ item?.url }}
                    </td>
                    <td class="px-6 py-4">
                        {{ item?.order_number }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-3">

                            <button @click="handelDelete(item.id)">
                                <Icon name="material-symbols:delete-outline-rounded"
                                      class="text-red-500 text-2xl"/>
                            </button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <div v-if="loading" class="w-full h-52 flex items-center justify-center">
                <div>
                    <LoadingButton :isLoading="loading">Loading</LoadingButton>
                </div>
            </div>
        </div>
    </AppLayout>

    <Modal title="Create New Trending" :isOpen="isModalOpened" @modal-close="closeModal">
        <div class="flex flex-wrap pt-5">
            <div class="w-full mb-4">
                <label for="name" class="block mb-1 text-xs font-normal">Item url</label>
                <input v-model="form.url" type="text" class="p-2 rounded border border-primary w-full bg-transparent">
            </div>
            <div class="w-full mb-4">
                <label for="name" class="block mb-1 text-xs font-normal">Order Number</label>
                <input v-model="form.order_number" type="number" class="p-2 rounded border border-primary w-full  bg-transparent">
            </div>
            <div class="w-full mb-4">
                <div>
                    <label for="image" class="text-xs block mb-1">Item Image</label>
                    <label for="cover_image" class="w-full h-36 flex items-center
                        justify-center gap-3 p-2 border border-dashed border-primary rounded-md text-primary cursor-pointer">
                        <input type="file" id="cover_image" hidden @change="handleFileChange">
                        <img v-if="bannerImg" :src="bannerImg" class="w-full h-full object-cover">
                        <div v-else>
                            <p class="text-xs">Upload Trending Item Image</p>
                        </div>
                    </label>
                 </div>
            </div>
            <div class="w-full">
                <button @click="onSubmit" class="w-full bg-primary py-2.5">Save Item</button>
            </div>
        </div>
    </Modal>
</template>
