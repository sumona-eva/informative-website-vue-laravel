
<script setup>
import  SummernoteEditor  from 'vue3-summernote-editor';
import { ref, onMounted } from 'vue'
import  useAxios  from '@/composables/useAxios';
import { useAuthStore } from "@/stores/useAuthStore";
import { useRouter, useRoute } from 'vue-router';
import { toast } from "vue3-toastify";

const { loading, error, sendRequest } = useAxios();
const authStore = useAuthStore();
const router = useRouter();
const route = useRoute();



const getProject = async () =>  {
    const response = await sendRequest({
        method:'get',
        url:`/v1/project/${route?.params?.id}`
    });
    if(response){
        form.value.id = response.data.data.id;
        form.value.title = response.data.data.title;
        form.value.project_category_id = response.data.data.project_category_id;
        form.value.project_category_id = response.data.data.project_category_id;
        form.value.order_number = response.data.data.order_number;
        form.value.short_description = response.data.data.short_description;
        form.value.description = response.data.data.description;
        form.value.old_images = response.data.data?.images;
        coverImg.value = response.data.data.cover_image;
    }
}

const categories = ref(null);
const getCategories = async() => {
    const response = await sendRequest({
        method:'get',
        url:'/v1/project-category',
    });
    categories.value = response?.data
}

//handle cover image
const coverImg = ref(null);
const coverImage = (image) => {
    const file = image.target.files[0];
    form.value.cover_image = file;
    coverImg.value = URL.createObjectURL(file);
}

const handleFileChange = (event) => {
    for (let i = 0; i < event.target.files.length; i++) {
        form.value.images.push({
            url: URL.createObjectURL(event.target.files[i]),
            file: event.target.files[i],
        });
    }
};

const removeMedia = (index) => {
    let removedImage = form.value.images[index];
    if (removedImage.url.startsWith('blob:')) {
        URL.revokeObjectURL(removedImage.url);
    }
    form.value.images.splice(index, 1);
};
const form = ref({
    id:null,
    title: null,
    project_category_id: null,
    cover_image: null,
    order_number: null,
    short_description: null,
    description: null,
    images: [],
    old_images: [],
});

// Save Product
const onSubmit = async(id) => {
    const response = await sendRequest({
        method: 'post',
        url: `/v1/project/${id}`,
        data: form.value,
        params: {
            _method:'PUT'
        },
        headers: {
            authorization: `Bearer ${authStore.user.token}`,
            'Content-Type': 'multipart/form-data'
        }
    });
    if(response?.data){
        toast.success( ' Product Added Successfully', {autoclose:1000, 'theme' : 'dark'});
        await router.push('/admin/projects');
    }
}
const deleteImage = async(id) => {
    const response = await sendRequest({
        method: 'post',
        url: `/v1/delete-project-image/${id}`,
    });
    if(response){
        toast.success( 'Image Deleted Successfully', {autoclose:5000, 'theme' : 'dark'});
        getProject();
    }
}

onMounted(() => {
    getCategories();
    getProject();
});
</script>
<template>
    <AppLayout>
        <div class="p-4 bg-secondary shadow-md me-4">
            <h3 class="text-sm mb-5">Update Project</h3>
            <div class="flex flex-wrap">
                <div class="w-1/2 flex flex-col gap-3 px-2">
                    <div class="w-full px-2">
                        <label for="title" class="text-xs mb-1">Project Name</label>
                        <input type="text" class="bg-transparent p-2 border border-primary w-full rounded" v-model="form.title" />
                    </div>
                    <div class="w-full flex items-center space-x-5 px-2">
                        <div class="w-1/2">
                            <label for="category" class="text-xs mb-1">Category</label>
                            <Select
                                label="name"
                                v-if="categories?.data"
                                :options="categories?.data"
                                :reduce="item => item.id"
                                :searchable="true"
                                v-model="form.project_category_id"
                                placeholder="Set Category"
                            >
                            </Select>
                        </div>
                        <div class="w-1/2">
                            <label for="title" class="text-xs mb-1">Order Number</label>
                            <input type="number" class="bg-transparent p-2 border border-primary w-full rounded" v-model="form.order_number" />
                        </div>
                    </div>
                    <div class="w-full">
                        <label for="title" class="text-xs mb-1">Short Description</label>
                        <textarea v-model="form.short_description" class="bg-transparent p-2 border border-primary w-full rounded h-32"></textarea>
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
                                    <p class="text-xs">Upload Product Cover Image</p>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="p-2  border border-primary rounded-lg">
                            <h4 class="mb-3 text-sm">Project Old Images</h4>
                            <div class="file-upload-container">
                                <div class="file-upload-container-wrapper">
                                    <div v-for="image in form.old_images"   class="file-upload-container-wrapper__preview">
                                        <img :src="image.url" class="file-upload-container-wrapper__preview-item">
                                        <button @click="deleteImage(image?.id)"  class="file-upload-container-wrapper__preview-cancel" type="button">
                                            <Icon name="material-symbols-light:delete-outline-rounded" class="text-white" />
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="p-2  border border-primary rounded-lg">
                            <h4 class="mb-3 text-sm">Project Images</h4>
                            <ul class="mb-2">
                                <li class="text-xs">999 KB limit.</li>
                                <li class="text-xs">Allowed types: <span class="text-primary"> JPG</span>, <span class="text-primary">JPEG</span>, <span class="text-primary">PNG</span>.</li>
                            </ul>
                            <div class="file-upload-container">
                                <div class="file-upload-container-wrapper">
                                    <!--IMAGES PREVIEW-->
                                    <div v-for="(image, index) in form.images"   class="file-upload-container-wrapper__preview" :key="image.index">
                                        <img :src="image.url" class="file-upload-container-wrapper__preview-item">
                                        <button @click="removeMedia(index)"  class="file-upload-container-wrapper__preview-cancel" type="button">
                                            <Icon name="material-symbols:close" class="text-white" />
                                        </button>
                                    </div>
                                    <!--UPLOAD BUTTON-->
                                    <div class="file-upload-container-wrapper__add">
                                        <label for="mu-file-input" class="file-upload-container__add-btn">
                                            <span>
                                                <Icon name="tabler:cloud-upload" />
                                            </span>
                                        </label>
                                        <input @change="handleFileChange" id="mu-file-input" type="file" accept="image/*" multiple hidden>
                                    </div>
                                </div>
                            </div>
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
            <button class="w-1/2 mx-auto bg-primary py-3" @click="onSubmit(form.id)">Update Project</button>
        </div>
    </AppLayout>
</template>
