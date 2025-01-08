import { ref } from 'vue';
import axios from 'axios';
import { toast } from 'vue3-toastify';


const axiosInstance  = axios.create({
    baseURL: import.meta.env.VITE_API_URL,
    withCredentials: true,
    xsrfHeaderName: "X-XSRF-TOKEN",
});

export default function useAxios() {
    const loading = ref(false);
    const error = ref(null);

    const sendRequest = async (config) => {
        const { useAuthStore } = await import('@/stores/useAuthStore');
        const authStore = useAuthStore();
        if (authStore?.user) {
            config.headers = {
                'Authorization': `Bearer ${authStore?.user?.token}`,
                 'Content-Type': 'multipart/form-data'
            }
        }
        loading.value = true;
        error.value = null;
        try {
            const response = await axiosInstance(config);
            return response;
        } catch (err) { 
            error.value = err.response ? err.response.data : err.message;
            if(error.value){
                toast.error(error.value.message, {autoClose: 1000, 'theme' : 'dark'});
            }
        } finally {
            loading.value = false;
        }
    };

    return {
        loading,
        error,
        sendRequest,
    };
}
