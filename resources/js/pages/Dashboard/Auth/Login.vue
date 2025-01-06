<template>
    <GuestLayout>
        <div class=" w-full flex justify-center items-center  py-10 lg:py-20">
            <div class="w-[90%] max-w-4xl bg-secondary flex flex-wrap rounded-xl shadow-xl p-4">
                <div class="w-full lg:w-1/2 lg:pr-5 lg:pt-10">
                    <h3 class="text-2xl font-semibold mb-3">Login</h3>
                    <div class="">
                        <label for="email" class="block pb-1 text-xs" >Email</label>
                        <input type="email" name="email" id="email" v-model="loginCredential.email" class="bg-transparent block w-full rounded-md  p-2 shadow-sm border  border-primary focus:outline-none  placeholder:text-gray-400 px-3 mb-2">
                    </div>
                    <div class="">
                        <label for="password" class="block pb-1 text-xs">Password</label>
                        <input type="password" name="password" v-model="loginCredential.password"  id="password" class="bg-transparent block w-full rounded-md  p-2  shadow-sm border border-primary focus:outline-none  placeholder:text-gray-400 px-3 mb-2">
                    </div>

                    <div class="text-center py-5">
                        <button @click="handleLogin" class="w-full py-2 bg-primary text-white font-bold text-center rounded-lg my-2">Log In</button>
                    </div>
                </div>
                <div class="hidden lg:block w-1/2">
                    <img class="w-full h-96 object-cover rounded-xl" src="https://cdn.logojoy.com/wp-content/uploads/20231122153748/what-is-graphic-design-header.jpg" alt="">
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref } from 'vue';
import { useAuthStore } from '@/stores/useAuthStore.js';
import { useRouter, useRoute } from 'vue-router'
import { toast } from "vue3-toastify";
import GuestLayout from '@/components/Layouts/GuestLayout.vue';

const authStore = useAuthStore();
const router = useRouter();

const loginCredential = ref({
    email: null,
    password: null,
});

const handleLogin = async () => {
    const loginResponse = await authStore.login(loginCredential.value);
    if (loginResponse) {
        toast.success('Login successfull!', { autoClose: 1000 });
        router.push('/admin/dashboard');
    }
}
</script>
