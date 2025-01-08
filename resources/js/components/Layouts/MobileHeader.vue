<script setup lang="ts">
import { RouterLink } from 'vue-router';
import {ref} from 'vue';

const isNav = ref(false);
</script>


<template>
    <section class="lg:hidden py-1 fixed top-0 left-0 w-full right-0 z-50 bg-white shadow-lg">
      <span class="absolute sidepart top-0 bottom-0 left-0 w-80 bg-secondary "></span>
        <Container class="relative z-10 flex items-center justify-between ">
            <RouterLink to="/">
                <img class="w-14 h-auto" src="@/assets/images/img/logo.png"  alt="Logo" >
            </RouterLink>

            <button v-if="isNav" @click="isNav = !isNav" class="w-10 h-10 border border-primary rounded-full flex items-center justify-center">
                <Icon name="material-symbols:close-rounded" class="text-primary text-2xl" />
            </button>
            <button v-else @click="isNav = !isNav" class="flex items-center justify-center border border-transparent">
                <Icon name="tabler:menu-2" class="text-4xl text-primary" />
            </button>
            
        </Container>


        <div class="fixed top-0 left-0 bottom-0 h-screen w-64 bg-white z-50 shadow transition-all duration-700"
            :class="{'-translate-x-0' : isNav, '-translate-x-64' : !isNav}">
            <ul class="flex flex-col gap-5 pl-5 pt-10 text-primary">
                <li>
                    <RouterLink to="/" class="block">Home</RouterLink>
                </li>
                <li>
                    <RouterLink to="/services" class="block">Services</RouterLink>
                </li>
                <li>
                    <RouterLink to="/" class="block">Shop</RouterLink>
                </li>
                <li>
                    <RouterLink to="/client" class="block">Our Clients</RouterLink>
                </li>
                <li>
                    <RouterLink to="/career" class="block">Careers</RouterLink>
                </li>
                <li>
                    <RouterLink to="/media" class="block">News & Media</RouterLink>
                </li>
                <li>
                    <RouterLink to="/contact" class="block">Contact</RouterLink>
                </li>
            </ul>
        </div>
    </section>
</template>
<style scoped>
.sidepart{
  clip-path: polygon(0 1%, 100% 0, 80% 99%, 0% 100%);
}
</style>