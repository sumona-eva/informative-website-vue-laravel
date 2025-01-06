<script setup>
import useAxios from '@/composables/useAxios.js';
import { ref, onMounted } from 'vue'
import { useAuthStore } from "@/stores/useAuthStore";
import { toast } from "vue3-toastify";
import {useRouter} from "vue-router";

const { loading, error, sendRequest } = useAxios();
const authStore = useAuthStore();
const router = useRouter();

const addST = () => {
    form.value.sub_titles.push({
        value:null,
    })
}
const removeST = (index) => form.value.sub_titles.splice(index, 1);


const addItems = () => {
    form.value.items.push({
        value:null,
    })
}
const removeItems = (index) => form.value.items.splice(index, 1);

const form = ref({
    name: null,
    sub_titles: [{
        value: null,
    }],
    items:[{
        value:null,
    }],
});

// Save Product
const onSubmit = async() => {
    const response = await sendRequest({
        method: 'post',
        url: '/v1/package',
        data: form.value,
        headers: {
            authorization: `Bearer ${authStore.user.token}`,
        }
    });
    if(response?.data){
        toast.success( 'Package Added Successfully', {autoclose:1000, 'theme' : 'dark'});
        await router.push('/admin/package');
    }
}
</script>
<template>
    <AppLayout>
        <div class="bg-secondary p-4">
            <h3>Create new Package</h3>
            <div class="max-w-xl">
                <div class="mb-6">
                    <label for="name" class="block mb-1">Package Name</label>
                    <input v-model="form.name" type="text" class="w-full p-2 rounded bg-transparent border focus:outline-none focus:ring-primary">
                </div>
                <div class="mb-6">
                    <div class="flex items-center justify-between">
                        <label class="block mb-2">Sub Title</label>
                        <button @click="addST" class="p-1 bg-primary text-sm text-nowrap rounded text-white">add more</button>
                    </div>
                    <div class="flex items-end gap-2" v-for="(item, index) in form.sub_titles">
                        <div class="w-full">
                            <label for="company-title" class="text-xs">Value</label>
                            <input v-model="item.value" type="text" class="w-full p-2 rounded bg-transparent border focus:outline-none focus:ring-primary">
                        </div>
                        <div v-if="form.sub_titles.length > 1">
                            <button  @click="removeST(index)" class="p-1 bg-primary text-sm text-nowrap rounded text-white">remove</button>
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <div class="flex items-center justify-between">
                        <label class="block mb-2">Package Items</label>
                            <button @click="addItems" class="p-1 bg-primary text-sm text-nowrap rounded text-white">add more</button>
                    </div>
                    <div class="flex items-end gap-2" v-for="(item, index) in form.items">
                        <div class="w-full">
                            <label for="company-title" class="text-xs">Value</label>
                            <input v-model="item.value" type="text" class="w-full p-2 rounded bg-transparent border focus:outline-none focus:ring-primary">
                        </div>
                        <div v-if="form.items.length > 1">
                            <button  @click="removeItems(index)" class="p-1 bg-primary text-sm text-nowrap rounded text-white">remove</button>
                        </div>
                    </div>
                </div>
                <div>
                    <button @click="onSubmit" class="bg-primary w-full py-2 text-white">Save Package</button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
