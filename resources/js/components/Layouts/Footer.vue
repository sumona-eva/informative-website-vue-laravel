<script setup lang="ts">

</script>

<template>
  <footer>
    <section class="bg-primary">
      <div class="border-b border-gray-600 py-2">
        <Container>
          <div class="flex justify-between">
            <div class="flex items-center gap-2">
              <img class="size-16" src="@/assets/images/img/logo.png" alt="">
            </div>
          </div>
        </Container>
      </div>
      <Container>
        <div>
          <div class="flex flex-wrap py-8 -mx-3">
            <div class="w-1/2 lg:w-1/4 px-3">
              <h2 class="font-medium text-base text-white mb-5  lg:text-left">ABOUT</h2>
              <p class="text-xs text-white font-normal max-w-48 leading-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe amet quasi quae eius consequuntur quia blanditiis nisi inventore illum enim?</p>
            </div>
            <div class="w-1/2 lg:w-1/4 px-3">
              <h2 class="font-medium text-base text-white mb-5  lg:text-left uppercase">Supplier Tools</h2>
              <ul class="flex flex-col lg:gap-3 text-white text-xs  lg:text-left">
                <li class="hover:text-secondary transition-all ease-in-out duration-500">Our Services</li>
                <li class="hover:text-secondary transition-all ease-in-out duration-500">Property</li>
                <li class="hover:text-secondary transition-all ease-in-out duration-500">Contact Us</li>
                <li class="hover:text-secondary transition-all ease-in-out duration-500">About Us</li>
              </ul>
            </div>
            <div class="w-1/2 lg:w-1/4 px-3 ">
              <h2 class="font-medium text-base text-white  mb-5  lg:text-left uppercase">Buyer Tools</h2>
              <ul class="flex flex-col lg:gap-3 text-white text-xs  lg:text-left">
                <li class="hover:text-secondary transition-all ease-in-out duration-500">Services Apps</li>
                <li class="hover:text-secondary transition-all ease-in-out duration-500">Import & Export Services</li>
                <li class="hover:text-secondary transition-all ease-in-out duration-500">Sourcing Knowledge Center</li>
                <li class="hover:text-secondary transition-all ease-in-out duration-500">Ready to Order</li>
                <li class="hover:text-secondary transition-all ease-in-out duration-500">RFQ</li>
              </ul>
            </div>
            <div class="w-1/2 lg:w-1/4 px-3 ">
              <h2 class="font-medium text-base  text-white mb-5 lg:text-left uppercase">Contact Us</h2>
              <ul class="flex flex-col lg:gap-3 text-xs text-white   lg:text-left">
                <li class="hover:text-secondary transition-all ease-in-out duration-500">About Commercial-DPT</li>
                <li class="hover:text-secondary transition-all ease-in-out duration-500">Our Services</li>
                <li class="hover:text-secondary transition-all ease-in-out duration-500">Our Quality Commitment</li>
                <li class="hover:text-secondary transition-all ease-in-out duration-500">Buyer Stories</li>
              </ul>
            </div>
          </div>

          <div class="flex flex-col lg:flex-row justify-between px-10 py-3 border-b border-gray-600">

            <div class="flex gap-2 text-nowrap lg:gap-3 items-center text-white text-xs pt-3 lg:pt-0">
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
                <p class="text-xs lg:text-sm  text-slate-300 py-2">© 2025 PIMA SISS</p>
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