import { defineStore } from 'pinia';
import { ref, computed } from 'vue';
import useAxios from '@/composables/useAxios';
import { useRouter } from 'vue-router';

export const useAuthStore = defineStore('auth', () => {
    const router = useRouter();
    const user = ref(JSON.parse(localStorage.getItem('user')) ?? null);
    const isLoggedIn = computed(() => !!user.value);

    const { loading, error, sendRequest } = useAxios();

    async function fetchUser() {
        const storedUser = JSON.parse(await getLocalStorage());
        if (storedUser) {
            try {
                const { data } = await sendRequest({
                    method: 'get',
                    url: '/user',
                    headers: {
                        "Authorization": `Bearer ${storedUser?.token}`
                    }
                });
                if (data) {} else {
                    await clearLocalStorage();
                }
            } catch (err) {
                await clearLocalStorage();
            }
        } else {
            await clearLocalStorage();
        }
    }

    async function login(credential) {
        try {
            await sendRequest({
                method: 'get',
                url: "/sanctum/csrf-cookie",
            });

            const loginResponse = await sendRequest({
                method: "post",
                url: "/login",
                data: credential
            });
            if (loginResponse) {
                await setLocalStorage(loginResponse.data);
                user.value = loginResponse.data;
                return loginResponse;
            }
        } catch (err) {
            throw err;
        }
    }


    async function logout() {
        try {
            await sendRequest({
                url: "/api/logout",
                method: "GET"
            });
            user.value = null;
            await clearLocalStorage();
            router.push({ name: "home" });
        } catch (err) {
            console.error("Logout failed", error.value);
        }
    }

    async function setLocalStorage(user) {
        localStorage.setItem('user', JSON.stringify(user));
    }

    async function clearLocalStorage() {
        localStorage.removeItem('user');
    }

    async function getLocalStorage() {
        return localStorage.getItem('user');
    }

    function getToken() {
        return JSON.parse(localStorage.getItem("user"))?.token;
    }

    return { user, login, isLoggedIn, fetchUser, logout, loading, error }
});
