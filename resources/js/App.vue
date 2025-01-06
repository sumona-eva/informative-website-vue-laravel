<template>
    <router-view></router-view>
</template>
<script setup>
import {onMounted, provide, ref} from "vue";
const headerSettings = ref(null)
provide('settings', headerSettings)
const {sendRequest, loading, error} = useAxios();
import useAxios from "@/composables/useAxios.js";
const getHomeSettings = async () => {
    const response = await sendRequest({
        url:"/api/frontend/get-setting?name=profile,social,hero,counter",
        method:"GET"
    })
    headerSettings.value = response.data
}

onMounted(async () => await getHomeSettings())
</script>
