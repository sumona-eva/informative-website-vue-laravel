<script setup>
import AppLayout from "@/components/Layouts/AppLayout.vue";
import {useAuthStore} from "@/stores/useAuthStore.js";
import {ref, onMounted} from 'vue';
import useAxios from '@/composables/useAxios.js';
import {toast} from "vue3-toastify";
const authStore = useAuthStore();
const {loadng, error, sendRequest} = useAxios();

const data = ref(null);
const getData = async () => {
    const response = await sendRequest({
        method:'get',
        url:'/v1/get-dashboard-data'
    });
    if(response){
        data.value = response?.data
    }
}


const request = ref(null);
const getRequest = async () => {
    const response = await sendRequest({
       method:'get',
       url:'/v1/get-all-inquires'
    });
    if(response){
        request.value = response?.data
    }
}

const deleteRequest = async (id) => {
    const response = sendRequest({
       method:'get',
       url:`/v1/delete-inquiry/${id}`
    });
    if(response){
        getRequest();
        toast.success('Request Deleted Successfully', {autoClose:500, 'theme':'dark'});
    }
}



onMounted(() => {
    getRequest();
    getData();
})

</script>
<template>
    <AppLayout>
    <div class="flex flex-wrap mb-4">
        <div class="w-1/4 px-3">
            <div class="w-full bg-blue-700 text-white px-4 py-6 ">
                <p class="text-4xl font-bold">{{data?.total_services}}</p>
                Total Services
            </div>
        </div>
        <div class="w-1/4 px-3">
            <div class="w-full bg-orange-500 text-white  px-4 py-6">
                <p class="text-4xl font-bold">{{ data?.total_packages }}</p>
                Total Packages
            </div>
        </div>
        <div class="w-1/4 px-3">
            <div class="w-full bg-emerald-500 text-white  px-4 py-6">
                <p class="text-4xl font-bold">{{ data?.total_projects }}</p>
                Total Projects
            </div>
        </div>
        <div class="w-1/4 px-3">
            <div class="w-full bg-pink-600 text-white  px-4 py-6">
                <p class="text-4xl font-bold">{{ data?.total_team }}</p>
                Total Team Member
            </div>
        </div>
    </div>
    <div class="flex flex-wrap border border-slate-600">
            <div class="w-1/3 border-r border-b border-slate-600" v-for="data in request">
                <div class="bg-secondary  p-2 relative">
                    <button @click="deleteRequest(data?.id)" class="absolute top-2 right-2">
                        <Icon name="material-symbols:delete-outline-sharp" />
                    </button>
					<ul class="flex flex-col gap-2">
						<li class="flex text-sm font-normal">
							<p class="w-1/3">Request Type</p>
							<p class="w-2/3 ">
							<span class="uppercase border border-primary inline-block font-medium text-white p-1 rounded-md">{{data?.type}}</span>
							</p>
						</li>
						<li class="flex text-sm font-normal">
							<p class="w-1/3">Name</p>	
							<p class="w-2/3 ">{{data?.name}}</p>	
						</li>
						<li class="flex text-sm font-normal">
							<p class="w-1/3">Phone</p>	
							<p class="w-2/3 ">{{data?.phone}}</p>	
						</li>
						<li class="flex text-sm font-normal">
							<p class="w-1/3">Email</p>	
							<p class="w-2/3 ">{{data?.email}}</p>	
						</li>
						<li class="flex text-sm font-normal">
							<p class="w-1/3">Request For</p>	
							<p class="w-2/3 ">{{data?.request}}</p>	
						</li>
						<li class="flex text-sm font-normal">
							<p class="w-1/3">Request For</p>	
							<p class="w-2/3 ">{{data?.business}}</p>	
						</li>
						<li class="flex text-sm font-normal">
							<p class="w-1/3">Location</p>	
							<p class="w-2/3 ">{{data?.location}}</p>	
						</li>
						<li class="bg-slate-600/20 p-2">
							<p class="text-sm">Message</p>	
							<p class="w-2/3 text-sm">{{data?.message}}</p>	
						</li>
					</ul>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
