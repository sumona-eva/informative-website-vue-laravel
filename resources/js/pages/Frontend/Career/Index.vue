<script setup>
import GuestLayout from '@/components/Layouts/GuestLayout.vue';
import {inject} from 'vue';
const data = inject('data');
</script>


<template>
  <GuestLayout>
    <section class="h-[40vh] lg:min-h-screen my-5 lg:my-12">
      <div class="flex justify-center items-center relative lg:py-20 bg-no-repeat bg-cover h-52 lg:h-screen
      bg-[url('https://img.freepik.com/free-photo/cloud-storage-background-business-network-design_53876-160252.jpg?t=st=1736157283~exp=1736160883~hmac=ff8b9dbbefa3c70cc5be306f983c86c669085b60cd5003b99a2c9beff96bc7bb&w=900')] ">
        <span class="absolute w-full h-full left-0 right-0 top-0 bottom-0 bg-black opacity-35"></span>
        <div class="relative z-10  text-center font-bold text-white lg:py-24 mx-auto">
          <h5 class="text-xl lg:pb-8 uppercase">career</h5>
          <h2 class="text-3xl lg:text-6xl pb-4 lg:pb-8 uppercase">Send Your Cv</h2>
          <a
              href="#"
              class="text-base font-medium border border-white px-2 py-1">
            pima_siss@yahoo.com
          </a>
        </div>
      </div>
    </section>

  </GuestLayout>
</template>



<style lang="scss" scoped>

</style>
