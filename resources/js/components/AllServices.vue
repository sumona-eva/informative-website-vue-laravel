<script setup>
import {inject} from 'vue'

const data = inject('data');
</script>
<template>
            <section class="py-6 lg:py-20">
            <Container>
                <div class="text-center">
                    <h4 class="section-title">All Services</h4>
                    <h3 class="text-2xl lg:text-5xl py-5 font-bold mb-5 lg:mb-10">Our Services</h3>

                    <p class="max-w-4xl text-center mx-auto text-base  lg:text-lg tracking-wide">Eye Art delivers exceptional graphic design services, including custom logos, branding, web and social media graphics, and clothing design. We create unique, high-quality visuals that bring your brand to life, ensuring each project stands out with style and professionalism.</p>
                </div>
                <div class="flex flex-wrap justify-center pt-20">
                    <div class="w-full lg:w-1/4 px-4 mb-8" v-for="service in data?.services">
                        <div class="w-full p-4 bg-secondary relative group hover:bg-primary">
                            <RouterLink :to="`/service/${service?.slug}`" class="absolute top-4 right-4 w-12 h-12 flex items-center justify-center bg-primary group-hover:bg-white">
                                <Icon name="ph:arrow-up-right-light" class="text-3xl group-hover:text-primary text-black" />
                            </RouterLink>
                            <div class="py-5">
                                <Icon :name="service?.icon" class="text-6xl group-hover:text-white text-primary" />
                            </div>
                            <RouterLink :to="`/service/${service?.slug}`" class="block text-xl font-bold mb-5 group-hover:text-black">{{service?.name}}</RouterLink>
                            <img  class="w-full h-44 rounded-md" :src="service?.image">
                        </div>
                    </div>
                </div>
            </Container>
            <Container>
                <h3 data-aos="fade-right" data-aos-duration="1200"  class="text-white text-4xl lg:text-8xl  font-extrabold py-12 tracking-wider"><span class="transparent-text">DIGITAL</span> SOLUTIONS</h3>
            </Container>
        </section>
</template>