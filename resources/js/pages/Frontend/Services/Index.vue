<script setup>

import Container from "@/components/Layouts/Container.vue";
import ServiceCard from "@/components/ServiceCard.vue";
import GuestLayout from "@/components/Layouts/GuestLayout.vue";
</script>

<template>
   <GuestLayout>
     <section>
       <div class="w-full h-52 lg:h-72">
         <img class="w-full h-full object-cover" src="@/assets/images/img/security2.png" alt="">
       </div>
       <Container>
         <div class="mt-16">
           <h2 class="text-2xl lg:text-4xl font-bold text-center text-primary my-5">All Services</h2>
           <div class="flex flex-wrap -mx-2">
             <div class="w-full lg:w-1/3 px-2 mb-4" v-for="item in 9">
               <ServiceCard   />
             </div>
           </div>
         </div>
       </Container>
     </section>
   </GuestLayout>
</template>