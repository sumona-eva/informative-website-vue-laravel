<script setup>

import GuestLayout from "@/components/Layouts/GuestLayout.vue";
import Container from "@/components/Layouts/Container.vue";
import ClientSection from "@/components/Home/ClientSection.vue";
</script>

<template>
  <GuestLayout>
    <section>
      <div class="h-52 lg:h-72 w-full ">
        <img class="h-full w-full object-cover" src="https://img.freepik.com/premium-photo/closeup-car-seller-standing-car-salon_232070-11746.jpg?w=900" alt="">
      </div>
      <Container>
        <div>
          <h2 class="text-2xl lg:text-5xl text-primary text-center py-10 font-semibold">List of Some of Our Esteemed Clients</h2>
        </div>
        <ClientSection />
       <div v-for="(item,index) in 4" :key="index">
         <div :class="{'justify-start': index%2 === 0, 'justify-end': index%2 !== 0} " class="flex mb-7">
           <div class="w-full lg:w-2/3">
             <div class="bg-secondary/40  w-full rounded-md p-6 shadow-lg">
               <h2 class="text-primary text-2xl font-semibold mb-8">
                 {{index+1}}. Apartment / Residence</h2>
               <ul>
                 <li class="flex items-center gap-5 mb-3 pl-5" v-for="item in 3">
                   <span class="size-4 rotate-45 bg-primary block"></span>
                   <div>
                     <h2 class="text-xl font-semibold text-primary">Concord Lake Breeze</h2>
                     <p class="text-sm font-medium text-primary">	Gulshan</p>
                   </div>
                 </li>
               </ul>
             </div>
           </div>
         </div>
       </div>
      </Container>
    </section>
  </GuestLayout>
</template>