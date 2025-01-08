<script setup>
import {ref, onMounted} from 'vue';
import useAxios from '@/composables/useAxios.js'
import {toast} from "vue3-toastify";

const {loading, error, sendRequest} = useAxios();

const posts = ref(null);
const getPosts = async () => {
    const response = await sendRequest({
        method:'get',
        url:'/v1/blog',
    });

    if(response){
        posts.value = response.data;
    }
}

const handelDelete = async (id) => {
    const response = await sendRequest({
        method:'delete',
        url:`/v1/blog/${id}`,
    });
    if(response){
        await getPosts();
        toast.success('Post Deleted Successfully', {autoClose:500, 'theme':'dark'})
    }
}

onMounted(() => {
    getPosts();
})
</script>
<template>
    <AppLayout>
        <div class="flex items-center justify-between p-5 bg-secondary">
            <div>
                <div class="flex items-center">
                    <h2 class="text-xl py-5 px-3">Posts</h2>
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

            <RouterLink :to="{name:'CreateBlog'}">
                <button
                    class="flex items-center justify-center gap-2 bg-primary px-3 py-2 text-white text-sm font-medium">
                    <Icon name="streamline:interface-add-circle-button-remove-cross-add-buttons-plus-circle"
                          class="text-sm shadow-lg border-primary"/>
                    Add Record
                </button>
            </RouterLink>
        </div>
        <div class="relative overflow-x-auto bg-secondary">
            <table class="w-full text-left rtl:text-right">
                <thead class="bg-gray-800 uppercase">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        action
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in posts?.data">
                    <td  class="px-6 py-4">
                        <img class="w-20 h-auto" :src="item?.image"  alt="" />
                    </td>
                    <td class="px-6 py-4">
                        {{ item?.title }}
                    </td>
                    <td class="px-6 py-4 ">
                        <div class="flex items-center gap-2">
                            <RouterLink :to="`/admin/edit-blog/${item.id}`">
                                <Icon name="material-symbols-light:edit-square-outline-sharp"
                                      class="text-green-500 text-2xl"/>
                            </RouterLink>
                            <button @click="handelDelete(item.id)">
                                <Icon name="material-symbols:delete-outline-rounded"
                                      class="text-red-600 text-2xl"/>
                            </button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </AppLayout>
</template>
