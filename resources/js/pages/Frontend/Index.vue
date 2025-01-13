<script setup>

import GuestLayout from "@/components/Layouts/GuestLayout.vue";
import Container from "@/components/Layouts/Container.vue";
import HeroSection from "@/components/Home/HeroSection.vue";
import CategorySection from "@/components/Home/CategorySection.vue";
import ProductSection from "@/components/Home/ProductSection.vue";
import AboutSection from "@/components/Home/AboutSection.vue";
</script>
<template>
    <GuestLayout>

        <HeroSection />
        <AboutSection />
        <CategorySection />
        <ProductSection />


    </GuestLayout>
</template>
