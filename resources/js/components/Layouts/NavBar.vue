<script setup>

import Button from "@/components/Button.vue";
</script>

<template>
  <section class="bg-primary py-2 relative">
    <span class="absolute flex items-center justify-end bg-white sidepart w-[270px] h-[64px] left-0  bottom-0 top-0" />
    <Container>
      <div class="flex justify-between relative z-10 ">
        <div class="h-12 w-auto">
          <img class="h-full w-full" src="@/assets/images/img/logo.png" alt="">
        </div>
        <div class="w-3/5">
          <ul class="flex items-center justify-end text-white gap-2">
            <li class=" text-base hover:text-normal p-3" >
              <RouterLink to="/" class="text-white hover:text-secondary transition-all ease-in-out duration-500">Home</RouterLink>
            </li>
            <li class="relative group text-white text-base hover:text-normal p-3" >
              <RouterLink to="/services"  class="text-white hover:text-secondary transition-all ease-in-out duration-500">
                Services
              </RouterLink>
              <div class="absolute bg-white shadow-lg text-primary  border-b-4 border-secondary w-72 -z-50 group-hover:z-50 opacity-0 group-hover:opacity-100 top-16 left-0">
                <ul class="flex flex-col gap-3 text-base p-5 font-bold">
                  <li><RouterLink to="/" class=" hover:text-secondary transition-all ease-in-out duration-300 "> Clinical dermatology</RouterLink></li>
                  <li><RouterLink to="/" class="hover:text-secondary transition-all ease-in-out duration-300 ">Aesthetic Dermatology</RouterLink></li>
                  <li><RouterLink to="/" class="hover:text-secondary transition-all ease-in-out duration-300"> Dermatology-cosmetic surgery</RouterLink></li>
                  <li><RouterLink to="/" class="hover:text-secondary transition-all ease-in-out duration-300">Biography</RouterLink></li>
                </ul>
              </div>
            </li>
            <li class="relative group text-base hover:text-normal  p-3" >
              <RouterLink to="/" class="text-white hover:text-secondary transition-all ease-in-out duration-500">
                Shop
              </RouterLink>
              <div class="absolute bg-white shadow-lg text-gray-700  border-b-4 border-primary w-48 -z-50 group-hover:z-50 opacity-0 group-hover:opacity-100 top-16 transition-all ease-in-out duration-500 left-0">
                <ul class="flex flex-col gap-3 text-base p-5 font-bold">
                  <li><RouterLink to="/" class=" hover:text-secondary transition-all ease-in-out duration-300 "> Shop 1 </RouterLink></li>
                  <li><RouterLink to="/" class="hover:text-secondary transition-all ease-in-out duration-300 ">Shop 2</RouterLink></li>
                  <li><RouterLink to="/" class="hover:text-secondary transition-all ease-in-out duration-300"> Shop 3</RouterLink></li>
                  <li><RouterLink to="/" class="hover:text-secondary transition-all ease-in-out duration-300">Shop 4</RouterLink></li>
                </ul>
              </div>
            </li>
            <li class=" text-base hover:text-normal hover:bg-primary  p-3  transition-all ease-in-out duration-500" >
              <RouterLink to="/client" class="text-white hover:text-secondary transition-all ease-in-out duration-500">About Us</RouterLink>
            </li>
            <li class=" text-base hover:text-normal hover:bg-primary  p-3  transition-all ease-in-out duration-500" >
              <RouterLink to="/contact" class="text-white hover:text-secondary transition-all ease-in-out duration-500">Patient Info</RouterLink>
            </li>
          </ul>
        </div>
        <div>
          <Button>
            Appointment Booking
          </Button>
        </div>
      </div>
    </Container>
  </section>

</template>
<style scoped>
.sidepart{
  clip-path: polygon(0 0%, 100% 0, 80% 100%, 0% 100%);
}
</style>