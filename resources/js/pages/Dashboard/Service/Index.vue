<script setup>
    import useAxios from "@/composables/useAxios.js";
    import {ref, onMounted} from 'vue';
    import {toast} from "vue3-toastify";
  

    const {loading, error, sendRequest} = useAxios();

    const services = ref(null);
    const getServices = async () => {
        const response = await sendRequest({
            method:'get',
            url:"/v1/service"
        });
        if(response) {
            services.value = response.data
        }
    }

    const handelDelete = async (id) => {
        const response = await sendRequest({
            method:'delete',
            url:`/v1/service/${id}`
        });

        if(response) {
            toast.success('Service deleted successfully', {autoClose:500, 'theme' : 'dark'});
            await getServices();
        }
    }

    onMounted(() => {
        getServices();
    })
</script>

<template>
    <AppLayout>
        
        <div class="flex items-center justify-between p-5 bg-secondary">
            <div>
                <div class="flex items-center">
                    <h2 class="text-xl py-5 px-3">Services</h2>
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

            <RouterLink :to="{ name:'CreateServices' }"
                    class="flex items-center justify-center gap-2 bg-primary px-4 py-2 text-white text-sm font-medium">
                    <Icon name="streamline:interface-add-circle-button-remove-cross-add-buttons-plus-circle"
                          class="text-sm shadow-lg border-primary"/>
                    Add Record
            </RouterLink>
        </div>
        <div class="relative overflow-x-auto bg-secondary">
            <table class="w-full text-left rtl:text-right">
                <thead class=" text-white uppercase bg-gray-800 tracking-wider">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        icon
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        action
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class=" border-b font-roboto " v-for="item in services?.data">
                    <td class="px-6 py-4">
                        <Icon :name="item?.icon" class="text-3xl" />
                    </td>
                    <td class="p-2">
                        <img class="w-20 h-12" :src="item?.image" alt="">
                    </td>
                    <td class="px-6 py-4">
                        {{ item?.name }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-3">
                            <RouterLink :to="`/admin/edit-service/${item?.id}`">
                                <Icon name="material-symbols:edit-square-outline"
                                    class="text-green-500 text-2xl" />
                            </RouterLink>
                            <button @click="handelDelete(item?.id)">
                                <Icon name="material-symbols:delete-outline-rounded"
                                    class="text-red-600 text-2xl" />
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
</template>
