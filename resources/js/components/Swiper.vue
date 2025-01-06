<script setup>

import { Swiper, SwiperSlide } from 'swiper/vue';
  import 'swiper/css';
  import { Autoplay} from 'swiper/modules';
  const modules = [Autoplay,];
</script>
<template>
  <div>
    <swiper
      :spaceBetween="30"
      :centeredSlides="true"
      :autoplay="{
        delay: 2500,
        disableOnInteraction: false,
      }"
      :modules="modules"
      class="mySwiper"
    >
      <swiper-slide><img src="@/assets/images/img/service.jpeg" alt="Images" class="w-full h-96"></swiper-slide>
      <swiper-slide><img src="@/assets/images/img/1691063201_h12.jpeg" alt="Images" class="w-full h-96"></swiper-slide>
      <swiper-slide><img src="@/assets/images/img/contact.jpg" alt="Images" class="w-full h-96"></swiper-slide>
    </swiper>
  </div>
</template>
