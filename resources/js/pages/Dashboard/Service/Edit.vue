<script setup>
import  SummernoteEditor  from 'vue3-summernote-editor';
import { ref, onMounted } from 'vue'
import  useAxios  from '@/composables/useAxios';
import { useAuthStore } from "@/stores/useAuthStore";
import { useRouter, useRoute } from 'vue-router';
import { toast } from "vue3-toastify";


const route = useRoute();
const { loading, error, sendRequest } = useAxios();
const authStore = useAuthStore();
const router = useRouter();


const getService = async () => {
    const response = await sendRequest({
        method:'get',
        url:`/v1/service/${route?.params?.id}`
    });
    if(response){
        form.value.name = response.data.data.name;
        form.value.icon = response.data.data.icon;
        form.value.order_number = response.data.data.order_number;
        form.value.description = response.data.data.description;
        serviceImg.value = response.data.data.image;
    }
}

//handle service image
const serviceImg = ref(null);
const onFileChange = (image) => {
    const file = image.target.files[0];
    form.value.image = file;
    serviceImg.value = URL.createObjectURL(file);
}


const form = ref({
    name: null,
    icon: null,
    image: null,
    order_number: null,
    description: null,
});

// Save Service
const onSubmit = async() => {
    const response = await sendRequest({
        method: 'post',
        url: `/v1/service/${route?.params?.id}`,
        data: form.value,
        params: {
            _method:'PUT'
        },
        headers: {
            'Content-Type': 'multipart/form-data',
        }
    });
    if(response?.data){
        toast.success( 'Service Added Successfully', {autoclose:1000, 'theme' : 'dark'});
        await router.push('/admin/services');
    }
}

onMounted(() => {
    getService();
})
</script>
<template>
    <AppLayout>
        <div class="p-4 bg-secondary shadow-md me-4">
            <h3 class="text-sm mb-5">Add New Service</h3>
            <div class="flex flex-wrap">
                <div class="w-1/2 flex flex-col gap-3 px-2">
                    <div class="w-full px-2">
                        <label for="title" class="text-xs mb-1">Service Name</label>
                        <input type="text" class="bg-transparent p-2 border border-primary w-full rounded" v-model="form.name" />
                    </div>
                    <div class="w-full flex items-center space-x-5 px-2">
                        <div class="w-2/3">
                            <label for="title" class="text-xs mb-1 flex items-center gap-2">Icon Code
                                <a href="https://icones.js.org/collection/all" target="_blank" class="text-primary flex items-center gap-1">Get icon code form here
                                    <Icon name="mdi:share-outline" />
                                </a>
                            </label>
                            <input type="text" class="bg-transparent p-2 border border-primary w-full rounded" v-model="form.icon" />
                        </div>
                        <div class="w-1/3">
                            <label for="title" class="text-xs mb-1">Order Number</label>
                            <input type="text" class="bg-transparent p-2 border border-primary w-full rounded" v-model="form.order_number" />
                        </div>
                    </div>
                </div>
                <div class="w-1/2 flex flex-col gap-4 px-2">
                    <div class="flex">
                        <div class="pr-2">
                            <label for="image" class="text-xs block mb-1">Service Image</label>
                            <label for="cover_image" class="w-52 h-36 flex items-center
                            justify-center gap-3 p-2 border border-dashed border-primary rounded-md text-primary cursor-pointer">
                                <input type="file" id="cover_image" hidden @change="onFileChange">
                                <img v-if="serviceImg" :src="serviceImg" class="w-full h-full object-cover">
                                <div v-else>
                                    <p class="text-xs">Upload Service Image</p>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="w-full px-2 editor mt-5">
                    <label for="title" class="text-sm mb-1 text-white py-3 block">Description</label>
                    <div class="editor_data">
                        <SummernoteEditor v-model="form.description" />
                    </div>
                </div>
            </div>

        </div>
        <div class="text-center pt-10">
            <button class="w-1/2 mx-auto bg-primary py-3" @click="onSubmit">Save Project</button>
        </div>
    </AppLayout>
</template>
