<script setup>

import GuestLayout from "@/components/Layouts/GuestLayout.vue";
import Container from "@/components/Layouts/Container.vue";
import ContactWidget from "@/components/ContactWidget.vue";
</script>

<template>
    <GuestLayout>
      <section class="h-52 lg:h-72 my-5 lg:my-12 bg-no-repeat bg-cover bg-center relative
                bg-[url('https://fse.jegtheme.com/cryptiva/wp-content/uploads/sites/26/2024/12/background-lock.jpg')]">
        <span class="absolute w-full h-full top-0 left-0 right-0 bottom-0  bg-primary/65"></span>
          <div class="relative flex flex-col gap-4 items-center justify-center h-full">
            <h2 class="text-5xl font-bold text-center text-white">Contact Us</h2>
            <p class="text-sm text-white text-center max-w-xl">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquid ea eligendi facilis laborum minus non pariatur sunt temporibus, voluptatem!</p>
          </div>
      </section>

       <Container>
         <div class="flex flex-wrap mb-12 lg:-mx-5">
           <div class="w-full lg:w-1/2 lg:px-5">
             <div class="flex flex-col gap-3 px-5 lg:px-8 shadow-lg rounded-xl h-full">
               <p class="text-lg font-bold text-secondary pt-5">Contact Us</p>
               <h2 class="text-4xl font-bold text-primary">Get In Touch</h2>
               <p class="text-sm text-primary max-w-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci cum dignissimos eos nam, nihil pariatur reiciendis repudiandae tempora tenetur voluptatibus!</p>
               <div class="flex flex-wrap -mx-3 mt-5">
                  <div class="w-full lg:w-1/2 px-3 mb-4 lg:mb-8">
                    <div>
                      <ContactWidget icon="material-symbols-light:home-and-garden-outline" title="Holly Rose Apartment" value="Plot – 2/8, Block – C, Lalmatia, Dhaka – 1207, Bangladesh" />
                    </div>
                  </div>
                 <div class="w-full lg:w-1/2 px-3 mb-4 lg:mb-8">
                    <div>
                      <ContactWidget icon="nimbus:telephone" title="Telephone" value="+880-2-8100205, Fax: +880-2-8100530" />
                    </div>
                  </div>
                 <div class="w-full lg:w-1/2 px-3 mb-4 lg:mb-8">
                    <div>
                      <ContactWidget icon="ic:twotone-mail-outline" title="E-mail" value="info@.com.bd" />
                    </div>
                  </div>
                 <div class="w-full lg:w-1/2 px-3 mb-4 lg:mb-8">
                    <div>
                      <ContactWidget icon="streamline:programming-web-server-world-internet-earth-www-globe-worldwide-web-network" title="Web Site/URL" value=" www.pima.com.bd" />
                    </div>
                  </div>
               </div>
             </div>
           </div>
           <div class="w-full lg:w-1/2 lg:px-5">
             <div class="shadow-lg rounded-xl px-5 mt-7 lg:mt-0  lg:px-16 py-5 h-full">
                <div class="mb-7">
                  <input type="text" class="w-full p-2 rounded-lg bg-white bg-transparent border border-secondary focus:outline-none focus:ring-0 focus:border-primary" placeholder="Your Name  ">
                </div>
                <div class="mb-7">
                  <input type="text" class="w-full p-2 rounded-lg bg-white bg-transparent border border-secondary focus:outline-none focus:ring-0 focus:border-primary" placeholder="Your Email  ">
                </div>
                <div class="mb-7">
                  <input type="text" class="w-full p-2 rounded-lg bg-white bg-transparent border border-secondary focus:outline-none focus:ring-0 focus:border-primary" placeholder="Your Subject  ">
                </div>
                <div class="mb-7">
                  <textarea type="text" placeholder="Your Message " class="w-full h-32 p-2 rounded-lg bg-white bg-transparent border border-secondary focus:outline-none focus:ring-0 focus:border-primary"></textarea>
                </div>
               <div>
                 <button  class="py-2 w-full bg-secondary text-base text-nowrap rounded-lg text-white">Send </button>
               </div>
             </div>
           </div>
         </div>
       </Container>

    </GuestLayout>
</template>