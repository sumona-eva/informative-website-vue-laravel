<script setup>
import Modal from '@/components/Modal.vue'
import {ref, onMounted} from 'vue';
import useAxios from "@/composables/useAxios.js";
import {toast} from "vue3-toastify";

const {loading, error, sendRequest} = useAxios();

const categories = ref(null);
const getCategories = async () => {
    const response = await sendRequest({
        method: 'get',
        url:'/v1/project-category',
    });
    if(response){
        categories.value = response.data;
    }
}


const form  = ref({
    name:null,
    order_number: null
})

const onSubmit = async () => {
    const response = await sendRequest({
        method:'post',
        url:'/v1/project-category',
        data:form.value
    });

    if(response){
        toast.success('Category Added Successfully', {autoClose:500, 'theme' : 'dark'})
        await getCategories();
        closeModal();
    }
}

const category = ref(null);
const editCategory = (cat) => {
    isEditModalOpened.value = true;
    category.value = cat;
}

const onUpdate = async (id) => {
    const response = sendRequest({
        method:'post',
        url:`/v1/project-category/${id}`,
        params: {
            _method:'PUT'
        },
        data:category.value
    });
    if(response){
        toast.success('Category Update Succesfully', {autoClose:500, 'theme':'dark'});
        getCategories();
        closeModal();
    }
}

const handelDelete = async (id) => {
    const response = await sendRequest({
        method:'delete',
        url:`/v1/project-category/${id}`
    });
    if(response){
        toast.success('Category Deleted Successfully', {autoClose:500, 'theme': 'dark'});
        await getCategories();

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
    isEditModalOpened.value = false;
    reset();
};

onMounted(() => {
    getCategories();
})
</script>
<template>
    <AppLayout>
        <div class="flex items-center justify-between p-5 bg-secondary">
            <div>
                <div class="flex items-center">
                    <h2 class="text-xl py-5 px-3">Project Categories</h2>
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
                        name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        slug
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
                <tr v-for="item in categories?.data">
                    <td class="px-6 py-4 text-lg text-white">
                        {{ item?.name }}
                    </td>
                    <td class="px-6 py-4 text-lg">
                        {{ item?.slug }}
                    </td>
                    <td class="px-6 py-4">
                        {{ item?.order_number }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-3">
                            <button @click="editCategory(item)">
                                <Icon name="material-symbols:edit-square-outline"
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
            <div v-if="loading" class="w-full h-52 flex items-center justify-center">
                <div>
                    <LoadingButton :isLoading="loading">Loading</LoadingButton>
                </div>
            </div>
        </div>
    </AppLayout>

    <Modal title="Create New Category" :isOpen="isModalOpened" @modal-close="closeModal">
        <div class="flex flex-wrap pt-5">
            <div class="w-full mb-4">
                <label for="name" class="block mb-1 text-xs font-normal">Category Name</label>
                <input v-model="form.name" type="text" class="p-2 rounded border border-primary w-full bg-transparent">
            </div>
            <div class="w-full mb-4">
                <label for="name" class="block mb-1 text-xs font-normal">Order Number</label>
                <input v-model="form.order_number" type="number" class="p-2 rounded border border-primary w-full  bg-transparent">
            </div>
            <div class="w-full">
                <button @click="onSubmit" class="w-full bg-primary py-2.5">Save Category</button>
            </div>
        </div>
    </Modal>

    <Modal title="Update Category" :isOpen="isEditModalOpened" @modal-close="closeModal">
        <div class="flex flex-wrap pt-5">
            <div class="w-full mb-4">
                <label for="name" class="block mb-1 text-xs font-normal">Category Name</label>
                <input v-model="category.name" type="text" class="p-2 rounded border border-primary w-full bg-transparent">
            </div>
            <div class="w-full mb-4">
                <label for="name" class="block mb-1 text-xs font-normal">Order Number</label>
                <input v-model="category.order_number" type="number" class="p-2 rounded border border-primary w-full  bg-transparent">
            </div>
            <div class="w-full">
                <button @click="onUpdate(category.id)" class="w-full bg-primary py-2.5">Update Category</button>
            </div>
        </div>
    </Modal>
</template>
