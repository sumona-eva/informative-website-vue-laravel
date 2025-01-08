<script setup>
import SideBar from '@/components/Layouts/SideBar.vue';
import Header from '@/components/Layouts/AdminHeader.vue';
</script>
<template>
    <div class="bg-gray-100 w-full h-screen flex">
        <aside class="w-52 bg-white fixed top-0 left-0 bottom-0 h-screen border-r border-gray-700">
            <SideBar/>
        </aside>
        <div class="ml-52 w-full h-screen">
            <main class=" min-h-screen pb-10 relative">
                <Header/>
                <div class="pb-1 mt-[2px]">
                    <slot/>
                </div>
            </main>
        </div>
    </div>
</template>
