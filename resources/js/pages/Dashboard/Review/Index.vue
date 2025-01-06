<script setup>
import {ref, onMounted} from 'vue';
import useAxios from "@/composables/useAxios.js";
import {toast} from "vue3-toastify";

const {loading, error, sendRequest} = useAxios();

const reviews = ref(null);
const getReviews = async () => {
    const response = await sendRequest({
        method: 'get',
        url:'/v1/review',
    });
    if(response){
        reviews.value = response.data;
    }
}


const handelDelete = async (id) => {
    const response = await sendRequest({
        method:'delete',
        url:`/v1/review/${id}`
    });
    if(response){
        toast.success('Review Deleted Successfully', {autoClose:500, 'theme': 'dark'});
        await getReviews();

    }
}
onMounted(() => {
    getReviews();
})
</script>
<template>
    <AppLayout>
        <div class="flex items-center justify-between p-5 bg-secondary">
            <div>
                <div class="flex items-center">
                    <h2 class="text-xl py-5 px-3">Review</h2>
                </div>
            </div>
        </div>
        <div class="relative overflow-x-auto bg-secondary">
            <table class="w-full text-left rtl:text-right">
                <thead class="text-white uppercase bg-gray-800">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Review
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Author Name
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Rating
                    </th>
                    <th scope="col" class="px-6 py-3">
                        action
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in reviews">
                    <td class="px-6 py-4 text-sm font-normal max-w-sm text-white">
                        {{ item?.review }}
                    </td>
                    <td class="px-6 py-4 text-lg">
                        {{ item?.author_name }}
                    </td>
                    <td class="px-6 py-4">
                        <ul class="flex items-center gap-2">
								<span class="flex items-center gap-2 text-lg text-primary">
								<Icon :name=" item?.rating < star ? 'carbon:star' : 'carbon:star-filled'" v-for="star in 5" />
							</span>
						</ul>
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
</template>
