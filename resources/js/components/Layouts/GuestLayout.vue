<script setup>
import Header from "@/components/Layouts/Header.vue";
import Footer from "@/components/Layouts/Footer.vue";
import TopHeader from "@/components/Layouts/TopHeader.vue";
import MobileHeader from "@/components/Layouts/MobileHeader.vue";
</script>
<template>
    <div class="w-full">

        <header>
            <MobileHeader />
            <Header/>
        </header>
        <main class="pt-16 lg:pt-0">
            <slot/>
        </main>
        <footer>
            <Footer/>
        </footer>
    </div>
</template>
