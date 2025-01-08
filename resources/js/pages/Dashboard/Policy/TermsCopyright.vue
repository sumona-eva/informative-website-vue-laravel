<script setup>
import { onMounted, ref } from 'vue';
import  SummernoteEditor  from 'vue3-summernote-editor';
import useAxios from '@/composables/useAxios';
import { useAuthStore } from '@/stores/useAuthStore';
import { toast } from 'vue3-toastify';


const authStore = useAuthStore();
const {loading, error, sendRequest} = useAxios();

const getTermsCopyright = async() => {
    const response = await sendRequest({
        method:'get',
        url:'/v1/setting',
        headers: {
            authorization: `Bearer ${authStore.user.token}`,
        }
    });
    form.value.terms_copyright = response.data.terms_copyright;
}

const form = ref({
    terms_copyright: null,
});

const onSubmit = async() => {
    const response = await sendRequest({
        method:'post',
        url:'/v1/setting',
        data:form.value
    });
    if(response){
        toast.success('Terms of use & Copyright Upadated Successfully', {autoClose:500, 'theme':'dark'});
        getTermsCopyright();
    }
}

onMounted(() => {
    getTermsCopyright();
})
</script>
<template>
    <AppLayout>
        <div class="w-full px-2 editor mt-5">
            <div class="flex justify-between items-center mb-5" >
                <label for="title" class="text-sm mb-1 text-white py-3 block">Terms of use & Copyright</label>
                <button @click="onSubmit" class=" bg-primary py-2 px-4 text-black">Save Terms of use & Copyright</button>
            </div>
            <div class="editor_data border border-gray-600">
                <SummernoteEditor v-model="form.terms_copyright" />
            </div>
        </div>
    </AppLayout>
</template> 