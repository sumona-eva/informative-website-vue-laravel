
<template>
    <div>
      <Swiper
          :style="{
                '--swiper-navigation-color': '#000',
                '--swiper-pagination-color': '#000',
              }"
          :loop="true"
          :spaceBetween="10"
          :navigation="true"
          :thumbs="{ swiper: thumbsSwiper }"
          :modules="modules"
          class="mySwiper2 mb-5"
      >
        <SwiperSlide>
          <InnerImageZoom class="w-full h-auto main-img" :src="coverImg" zoomType="hover"/>
        </SwiperSlide>
        <SwiperSlide v-for="slide in images">
          <InnerImageZoom class="w-full h-auto  main-img" :src="slide?.url" zoomType="hover"/>
        </SwiperSlide>
      </Swiper>
 
      <Swiper
          @swiper="setThumbsSwiper"
          :navigation="true"
          :loop="true"
          :spaceBetween="20"
          :slidesPerView="4"
          :freeMode="true"
          :watchSlidesProgress="true"
          :modules="modules"
          class="mySwiper "
      >
        <SwiperSlide class="mb-2">
          <img class="w-full h-full" :src="coverImg">
        </SwiperSlide>
        <SwiperSlide v-for="slide in images">
          <img  class="w-full h-full" :src="slide?.url">
        </SwiperSlide>
      </Swiper>
    </div>
  </template>

  <script setup>
  import { ref } from 'vue'
  // import '@websitebeaver/vue-magnifier/styles.css'
  import 'vue-inner-image-zoom/lib/vue-inner-image-zoom.css';
  import InnerImageZoom from 'vue-inner-image-zoom';

  import { Swiper, SwiperSlide } from 'swiper/vue';
  import { FreeMode, Navigation, Thumbs } from 'swiper/modules';
  import 'swiper/css';
  import 'swiper/css/free-mode';
  import 'swiper/css/navigation';
  import 'swiper/css/thumbs';

  const modules  = [FreeMode, Navigation, Thumbs];
  const thumbsSwiper = ref(null);
  const setThumbsSwiper = (swiper) => {
    thumbsSwiper.value = swiper;
  };

  defineProps({
    coverImg:String,
    images:{
      type:Array,
      required:true
    }
  })
  // const currentSlide = ref(0)
  // const slideTo = (val)=> {
  //     currentSlide.value = val
  // }

  </script>

  <style scoped>

    @media only screen and (max-width: 600px) {
      .desktop {
        display: none !important;
      }
      .mobile {
        display: block !important;
      }
  }

  @media only screen and (min-width: 600px) {
      .desktop {
        display: block !important;
      }
      .mobile {
        display: none !important;
      }
  }
  
  .iiz__img {
    width: 100% !important;
  }
    .gallery .swiper-slide{
        height: 100px !important;
        margin-bottom: 20px !important;
    }
</style>