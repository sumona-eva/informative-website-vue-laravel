<script setup>
import { onMounted, ref } from 'vue';
import useAxios from '@/composables/useAxios';
import { useAuthStore } from '@/stores/useAuthStore';
import { toast } from 'vue3-toastify';


const authStore = useAuthStore();
const {loading, error, sendRequest} = useAxios();

const getAllSetting = async() => {
    const response = await sendRequest({
        method:'get',
        url:'/v1/setting',
        headers: {
            authorization: `Bearer ${authStore.user.token}`,
        }
    });
    form.value.phone_number = response.data.phone_number;
    form.value.email_address = response.data.email_address;
    form.value.socials = response.data.socials;
    form.value.clients = response.data.clients;
    form.value.projects = response.data.projects;
    form.value.experts = response.data.experts;
    form.value.whatsapp_number = response.data.whatsapp_number;
    form.value.yt_video_iframe = response.data.yt_video_iframe;
}

const addSocials = () => {
    form.value.socials.push({
        key:null,
        value:null,
    })
}
const remove = (index) => form.value.socials.splice(index, 1);


const form = ref({
    phone_number: null,
    email_address: null,
    projects: null,
    clients: null,
    experts: null,
    whatsapp_number: null,
    yt_video_iframe: null,
    socials: [{
        icon:null,
        link:null,
    }]
});

const onSubmit = async () => {
    const response = await sendRequest({
        method:'post',
        url:'/v1/setting',
        data:form.value
    });
    if(response){
        toast.success('Setting Upadated Successfully', {autoClose:500, 'theme':'dark'});
        getAllSetting();
    }
}


onMounted(() => {
    getAllSetting();
})
</script>
<template>
    <AppLayout>
        <div class="flex flex-wrap p-4 bg-secondary">
            <div class="w-1/2 px-2">
                <div class="mb-2">
                    <label for="phone_number">Phone Number</label>
                    <input v-model="form.phone_number" type="text" class="w-full p-2 rounded bg-transparent border focus:outline-none focus:ring-primary">
                </div>
            </div>
            <div class="w-1/2 px-2">
                <div class="mb-2">
                    <label for="phone_number">Whatsapp Number</label>
                    <input v-model="form.whatsapp_number" type="text" class="w-full p-2 rounded bg-transparent border focus:outline-none focus:ring-primary">
                </div>
            </div>
            <div class="w-1/2 px-2">
                <div class="mb-2">
                    <label for="phone_number">Email Addreess</label>
                    <input v-model="form.email_address" type="text" class="w-full p-2 rounded bg-transparent border focus:outline-none focus:ring-primary">
                </div>
            </div>
            <div class="w-1/2 px-2">
                <div class="mb-2">
                    <label for="phone_number">Projects</label>
                    <input v-model="form.projects" type="text" class="w-full p-2 rounded bg-transparent border focus:outline-none focus:ring-primary">
                </div>
            </div>
            <div class="w-1/2 px-2">
                <div class="mb-2">
                    <label for="phone_number">Experts</label>
                    <input v-model="form.experts" type="text" class="w-full p-2 rounded bg-transparent border focus:outline-none focus:ring-primary">
                </div>
            </div>
            <div class="w-1/2 px-2">
                <div class="mb-2">
                    <label for="phone_number">Clients</label>
                    <input v-model="form.clients" type="text" class="w-full p-2 rounded bg-transparent border focus:outline-none focus:ring-primary">
                </div>
            </div>
            <div class="w-full px-2">
                <div class="mb-2">
                    <label for="phone_number">Youtube Video Iframe</label>
                    <textarea v-model="form.yt_video_iframe" class="w-full h-20 p-2 rounded bg-transparent border focus:outline-none focus:ring-primary"></textarea>
                </div>
            </div>
            <div class="w-full flex flex-wrap px-2">
                <div class="w-full flex items-center gap-2 py-4">
                    <label for="socials">Social Icon</label>
                    <button @click="addSocials" class="text-sm bg-primary text-black rounded px-1">Add More</button>
                </div>
                <div class="w-1/2 mb-3 p-4 border border-gray-500 rounded relative" v-for="(item, index) in form.socials">
                    <button class="absolute top-1 right-1 bg-primary text-black rounded" v-if="form.socials?.length > 1" @click="remove(index)">
                        <Icon name="material-symbols:close" />
                    </button> 
                    <div class="mb-3">
                    <div class="flex items-center gap-2"> 
                        <label for="icon">Icon</label>
                        <a href="https://icones.js.org/collection/all" target="_blank" class="text-primary flex items-center gap-1">Get icon code form here
                                    <Icon name="mdi:share-outline" />
                                </a>
                    </div>
                    <input  v-model="item.icon" type="text" class="w-full p-2 rounded bg-transparent border focus:outline-none focus:ring-primary">
                    </div>
                    <div>
                        <label for="icon">Link</label>
                    <input  v-model="item.link" type="text" class="w-full p-2 rounded bg-transparent border focus:outline-none focus:ring-primary">
                    </div>
                </div>
            </div>
            <div class="w-full px-2 text-center py-2">
                <button @click="onSubmit" class="bg-primary text-white py-2 w-1/2">Save Setting</button>
            </div>
        </div>
    </AppLayout>
</template>
