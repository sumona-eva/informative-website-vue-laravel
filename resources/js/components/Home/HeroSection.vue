
<script setup lang="ts">

// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';

// Import Swiper styles
import 'swiper/css';

import 'swiper/css/effect-cube';
import 'swiper/css/pagination';
import 'swiper/css/autoplay';

// import required modules
import { Autoplay, Pagination, EffectCube } from 'swiper/modules';
import Button from "@/components/Button.vue";

const modules = [Autoplay, Pagination, EffectCube]

</script>

<template>
  <section class="mt-6 lg:my-20 ">
    <Container>
      <div class="flex flex-wrap lg:-mx-4">
        <div class="w-full lg:w-1/2 flex items-center justify-center mb-5 lg:mb-0 px-4">
          <div class="flex flex-col items-center lg:items-start text-center lg:text-left">
            <h2 class="text-3xl lg:text-6xl font-semibold text-primary max-w-2xl">Professional Protection With Reliable Service</h2>
            <span class="w-16 bg-secondary h-[1px] block mt-7 text-center"></span>
            <p class="text-sm lg:text-xl font-normal text-gray-600 py-6 max-w-xl">
              A unique and powerful software suite to transform the way you work. Designed for businesses of all sizes, built by a company that values your privacy.
            </p>
            <Button>
              GET STARTED FOR FREE
              <Icon name="material-symbols:arrow-forward-ios-rounded" />
            </Button>

          </div>
        </div>
        <div class="w-full lg:w-1/2 flex items-center justify-center px-4">
          <div class=" overflow-hidden lg:mt-10 h-72 lg:h-96 py-5 lg:py-0">
            <swiper
                :effect="'cube'"
                :grabCursor="true"
                :cubeEffect="{
                  shadow: false,
                  slideShadows: true,
                  shadowOffset: 20,
                  shadowScale: 0.94,
                }"
                :autoplay = "true"
                :pagination="true"
                :modules="modules"
                class="mySwiper"
            >
              <swiper-slide>
                <div>
                  <img class="w-full h-full" src="@/assets/images/img/security.png" />
                </div>
              </swiper-slide>
              <swiper-slide >
                <div >
                  <img class="w-full h-full" src="https://img.freepik.com/premium-vector/security-token-flat-illustration-nft-non-fungible-token-concept-blue-yellow-green-color_146120-343.jpg?w=826" />
                </div>
              </swiper-slide>

            </swiper>
          </div>
        </div>
      </div>
    </Container>
  </section>
</template>
