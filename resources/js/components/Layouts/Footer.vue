<script setup lang="ts">

import Icon from "@/components/Icon.vue";
</script>

<template>
  <footer>
    <div class="border-b border-primary bg-primary/20 py-2">
      <Container>
        <div class="flex justify-between">
          <div class="flex items-center gap-2">
            <img class="size-20" src="@/assets/images/img/logo.png" alt="">
          </div>
          <div class="flex items-center justify-center">
            <ul class="flex gap-5">
              <li>
                <Icon name="meteor-icons:facebook-alt" class="text-2xl text-primary" />
              </li>
              <li>
                <Icon name="ant-design:twitter-outlined" class="text-2xl text-primary" />
              </li>
              <li>
                <Icon name="uil:instagram" class="text-2xl text-primary" />
              </li>
            </ul>
          </div>
        </div>
      </Container>
    </div>
    <section class="bg-white">
      <Container>
        <div>
          <div class="flex flex-wrap py-8 -mx-3">
            <div class="w-1/2 lg:w-1/4 px-3">
              <h2 class="font-medium text-base text-gray-800 mb-5  lg:text-left">ABOUT</h2>
              <p class="text-xs text-gray-800 font-normal max-w-60 leading-loose">
                Skin, Hair, Nail, Oral Cavity
                Allergy, Sexually transmitted diseases, Sexual dysfunction, Childlessness, aesthetic procedure,
                Dermato-cosmetic surgery,Dermoscopy, Woods lamp, Skin Biopsy
                 </p>
            </div>


            <div class="w-1/2 lg:w-1/4 px-3">
              <h2 class="font-medium text-base text-gray-800 mb-5  lg:text-left uppercase">Information</h2>
              <ul class="flex flex-col lg:gap-3 text-gray-800 text-xs  lg:text-left">
                <li class="hover:text-primary transition-all ease-in-out duration-500">Services</li>
                <li class="hover:text-primary transition-all ease-in-out duration-500">Online Shop</li>
                <li class="hover:text-primary transition-all ease-in-out duration-500">Patient Info</li>
                <li class="hover:text-primary transition-all ease-in-out duration-500">Contact Us</li>
                <li class="hover:text-primary transition-all ease-in-out duration-500">Delivery Information</li>
              </ul>
            </div>

            <div class="w-1/2 lg:w-1/4 px-3">
              <h2 class="font-medium text-base text-gray-800 mb-5  lg:text-left uppercase">Skin Treatments</h2>
              <ul class="flex flex-col lg:gap-3 text-gray-800 text-xs  lg:text-left">
                <li class="hover:text-primary transition-all ease-in-out duration-500">Clinical dermatology</li>
                <li class="hover:text-primary transition-all ease-in-out duration-500">Aesthetic Dermatology</li>
                <li class="hover:text-primary transition-all ease-in-out duration-500">Dermato-cosmetic surgery</li>
                <li class="hover:text-primary transition-all ease-in-out duration-500">Biography</li>
              </ul>
            </div>

            <div class="w-1/2 lg:w-1/4 px-3 ">
              <h2 class="font-medium text-base  text-gray-800 mb-5 lg:text-left uppercase">Contact Us</h2>
              <ul class="flex flex-col lg:gap-3 text-xs text-gray-800   lg:text-left">
                <li class="hover:text-primary transition-all ease-in-out duration-500">Tel: 01717833910, 01777-071673</li>
                <li class="hover:text-primary transition-all ease-in-out duration-500">skinmagic.beuty@gmail.com</li>
                <li class="hover:text-primary transition-all ease-in-out duration-500">skin magic centre</li>
                <li class="hover:text-primary transition-all ease-in-out duration-500">4 KDA avenue,

                  Satraster more ,Sadar ,khulna</li>
              </ul>
            </div>
          </div>

          <div class="flex flex-col lg:flex-row justify-between px-10 py-3 border-b border-primary">

            <div class="flex gap-2 text-nowrap lg:gap-3 items-center text-gray-800 text-xs pt-3 lg:pt-0">
              <p>Terms & Conditions</p>
              <span class="w-1 h-1 rounded-full bg-white"></span>
              <p>Privacy Policy </p>
              <span class="w-1 h-1 rounded-full bg-white"></span>
              <p>Payment Policy</p>
            </div>
          </div>

          <div>
            <div class="flex justify-between items-center lg:items-start py-1 px-10">
              <div>
                <p class="text-xs lg:text-sm  text-slate-300 py-2">© 2025 SKIN MAGIC</p>
              </div>
              <div class="flex gap-4 text-slate-300 text-xs lg:text-sm ">
                <p class="text-xs lg:text-sm  text-slate-300 py-2">Creative Tech Park</p>
              </div>
            </div>
          </div>
        </div>
      </Container>
    </section>
  </footer>
</template>