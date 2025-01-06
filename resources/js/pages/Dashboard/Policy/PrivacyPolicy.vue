<script setup>
import { onMounted, ref } from 'vue';
import  SummernoteEditor  from 'vue3-summernote-editor';
import useAxios from '@/composables/useAxios';
import { useAuthStore } from '@/stores/useAuthStore';
import { toast } from 'vue3-toastify';


const authStore = useAuthStore();
const {loading, error, sendRequest} = useAxios();

const getPrivacyPolicy = async() => {
    const response = await sendRequest({
        method:'get',
        url:'/v1/setting',
        headers: {
            authorization: `Bearer ${authStore.user.token}`,
        }
    });
    form.value.privacy_policy = response.data.privacy_policy;
}

const form = ref({
    privacy_policy: null,
});

const onSubmit = async() => {
    const response = await sendRequest({
        method:'post',
        url:'/v1/setting',
        data:form.value
    });
    if(response){
        toast.success('Privacy Policy Upadated Successfully', {autoClose:500, 'theme':'dark'});
        getPrivacyPolicy();
    }
}

onMounted(() => {
    getPrivacyPolicy();
})
</script>
<template>
    <AppLayout>
        <div class="w-full px-2 editor mt-5">
            <div class="flex justify-between items-center mb-5" >
                <label for="title" class="text-sm mb-1 text-white py-3 block">Privacy Policy</label>
                <button @click="onSubmit" class=" bg-primary py-2 px-4 text-black">Save Privacy Policy</button>
            </div>
            <div class="editor_data border border-gray-600">
                <SummernoteEditor v-model="form.privacy_policy" />
            </div>
        </div>
    </AppLayout>
</template> 