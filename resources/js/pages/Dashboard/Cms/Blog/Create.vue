import AppLayout from '@/components/Layouts/AppLayout.vue';
<script setup>
import  SummernoteEditor  from 'vue3-summernote-editor';
import { ref, onMounted } from 'vue'
import  useAxios  from '@/composables/useAxios';
import { useAuthStore } from "@/stores/useAuthStore";
import { useRouter } from 'vue-router';
import { toast } from "vue3-toastify";

const { loading, error, sendRequest } = useAxios();
const authStore = useAuthStore();
const router = useRouter();

const coverImg = ref(null);
const coverImage = (image) => {
    const file = image.target.files[0];
    form.value.image = file;
    coverImg.value = URL.createObjectURL(file);
}
const form = ref({
    title: null,
    image: null,
    author_name: null,
    content: null,
});

// Save Product
const onSubmit = async() => {
    const response = await sendRequest({
        method: 'post',
        url: '/v1/blog',
        data: form.value,
        headers: {
            authorization: `Bearer ${authStore.user.token}`,
            'Content-Type': 'multipart/form-data'
        }
    });
    if(response?.data){
        toast.success( ' Product Added Successfully', {autoclose:1000, 'theme' : 'dark'});
        await router.push('/admin/blog');
    }
}
</script>
<template>
    <AppLayout>
        <div class="p-4 bg-secondary shadow-md me-4">
            <h3 class="text-sm mb-5">Add New Blog</h3>
            <div class="flex flex-wrap">
                <div class="w-1/2 flex flex-col gap-3 px-2">
                    <div class="w-full px-2">
                        <label for="title" class="text-xs mb-1">Blog Title</label>
                        <input type="text" class="bg-transparent p-2 border border-primary w-full rounded" v-model="form.title" />
                    </div>
                    <div class="w-full px-2">
                        <label for="title" class="text-xs mb-1">Author Name</label>
                        <input type="text" class="bg-transparent p-2 border border-primary w-full rounded" v-model="form.author_name" />
                    </div>
                </div>
                <div class="w-1/2 flex flex-col gap-4 px-2">
                    <div class="flex">
                        <div class="pr-2">
                            <label for="image" class="text-xs block mb-1">Cover Image</label>
                            <label for="cover_image" class="w-52 h-36 flex items-center
                            justify-center gap-3 p-2 border border-dashed border-primary rounded-md text-primary cursor-pointer">
                                <input type="file" id="cover_image" hidden @change="coverImage">
                                <img v-if="coverImg" :src="coverImg" class="w-full h-full object-cover">
                                <div v-else>
                                    <p class="text-xs">Upload Blog Image</p>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="w-full px-2 editor mt-5">
                    <label for="title" class="text-sm mb-1 text-white py-3 block">Description</label>
                    <div class="editor_data">
                        <SummernoteEditor v-model="form.content" />
                    </div>
                </div>
            </div>

        </div>
        <div class="text-center pt-10">
            <button class="w-1/2 mx-auto bg-primary py-3" @click="onSubmit">Save Post</button>
        </div>
    </AppLayout>
</template>
