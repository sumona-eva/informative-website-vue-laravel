<script setup lang="ts">

import { Swiper, SwiperSlide } from 'swiper/vue';
import {Navigation,Autoplay } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';

const modules  = [Navigation, Autoplay];
</script>

<template>
  <Container class="lg:pb-12">
    <div>
      <h2 class="text-3xl font-semibold text-primary py-6 lg:py-10 text-center">Our Clients</h2>
    </div>
    <Swiper
        :breakpoints="{
              '320': {
                  slidesPerView:4,
                  spaceBetween: 5,
              },
              '768': {
                  slidesPerView: 3,
                  spaceBetween: 10,
              },
              '1024': {
                  slidesPerView:6,
                  spaceBetween: 10,
              },
          }"
        :navigation="true"
        :autoplay="{
          delay: 2000,
          disableOnInteraction: false,
        }"
        :modules="modules"
        class="mySwiper"
    >
      <SwiperSlide>
        <RouterLink to="/" class="bg-white size-16 lg:size-32 my-5 p-2 shadow-lg rounded-full flex items-center justify-center">
          <img class="w-full h-full object-cover rounded-full" src="@/assets/images/img/01.jpg" alt="" />
        </RouterLink>
      </SwiperSlide>
      <SwiperSlide>
        <RouterLink to="/" class="bg-white size-16 lg:size-32 my-3 p-2 shadow-lg rounded-full flex items-center justify-center">
          <img class="w-full h-full object-cover rounded-full" src="@/assets/images/img/03.jpg" alt="" />
        </RouterLink>
      </SwiperSlide>
      <SwiperSlide>
        <RouterLink to="/" class="bg-white size-16 lg:size-32 my-3 p-2 shadow-lg rounded-full flex items-center justify-center">
          <img class="w-full h-full object-cover rounded-full" src="@/assets/images/img/04.jpg" alt="" />
        </RouterLink>
      </SwiperSlide>
      <SwiperSlide>
        <RouterLink to="/" class="bg-white size-16 lg:size-32 my-3 p-2 shadow-lg rounded-full flex items-center justify-center">
          <img class="w-full h-full object-cover rounded-full" src="@/assets/images/img/05.jpg" alt="" />
        </RouterLink>
      </SwiperSlide>
      <SwiperSlide>
        <RouterLink to="/" class="bg-white size-16 lg:size-32 my-3 p-2 shadow-lg rounded-full flex items-center justify-center">
          <img class="w-full h-full object-cover rounded-full" src="@/assets/images/img/08.jpg" alt="" />
        </RouterLink>
      </SwiperSlide>
      <SwiperSlide>
        <RouterLink to="/" class="bg-white size-16 lg:size-32 my-3 p-2 shadow-lg rounded-full flex items-center justify-center">
          <img class="w-full h-full object-cover rounded-full" src="@/assets/images/img/09.jpg" alt="" />
        </RouterLink>
      </SwiperSlide>
      <SwiperSlide>
        <RouterLink to="/" class="bg-white size-16 lg:size-32 my-3 p-2 shadow-lg rounded-full flex items-center justify-center">
          <img class="w-full h-full object-cover rounded-full" src="@/assets/images/img/01.jpg" alt="" />
        </RouterLink>
      </SwiperSlide>
      <SwiperSlide>
        <RouterLink to="/" class="bg-white size-16 lg:size-32 my-3 p-2 shadow-lg rounded-full flex items-center justify-center">
          <img class="w-full h-full object-cover rounded-full" src="@/assets/images/img/01.jpg" alt="" />
        </RouterLink>
      </SwiperSlide>
      <SwiperSlide>
        <RouterLink to="/" class="bg-white size-16 lg:size-32 my-3 p-2 shadow-lg rounded-full flex items-center justify-center">
          <img class="w-full h-full object-cover rounded-full" src="@/assets/images/img/01.jpg" alt="" />
        </RouterLink>
      </SwiperSlide>
      <SwiperSlide>
        <RouterLink to="/" class="bg-white size-16 lg:size-32 my-3 p-2 shadow-lg rounded-full flex items-center justify-center">
          <img class="w-full h-full object-cover rounded-full" src="@/assets/images/img/01.jpg" alt="" />
        </RouterLink>
      </SwiperSlide>
    </Swiper>
  </Container>
</template>

<style scoped>

</style>