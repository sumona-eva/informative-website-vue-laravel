<script setup>

</script>

<template>
  <section class="bg-primary py-2">
    <Container>
      <div class="flex ">
        <div class="w-1/3">

        </div>
        <div class="w-2/3">
          <ul class="flex items-center justify-end text-white gap-3">
            <li class=" text-base font-semibold p-3" >
              <RouterLink to="/" class="text-white hover:border-b-2 transition-all ease-in-out duration-500">Home</RouterLink>
            </li>
            <li class="relative group text-white text-base font-semibold p-3" >
              <RouterLink to="/services"  class="text-white hover:border-b-2 transition-all ease-in-out duration-500">
                Services
              </RouterLink>
              <div class="absolute bg-white shadow-lg text-primary  border-b-4 border-primary w-48 -z-50 group-hover:z-50 opacity-0 group-hover:opacity-100 top-16 left-0">
                <ul class="flex flex-col gap-3 text-base p-5 font-bold">
                  <li><RouterLink to="/" class=" hover:border-b-2 transition-all ease-in-out duration-300 "> Service 1 </RouterLink></li>
                  <li><RouterLink to="/" class="hover:border-b-2 transition-all ease-in-out duration-300 ">Service 2</RouterLink></li>
                  <li><RouterLink to="/" class="hover:border-b-2 transition-all ease-in-out duration-300"> Service 3</RouterLink></li>
                  <li><RouterLink to="/" class="hover:border-b-2 transition-all ease-in-out duration-300">Service 4</RouterLink></li>
                </ul>
              </div>
            </li>
            <li class="relative group text-base font-semibold  p-3" >
              <RouterLink to="/" class="text-white hover:border-b-2 transition-all ease-in-out duration-500">
                Shop
              </RouterLink>
              <div class="absolute bg-white shadow-lg text-gray-700  border-b-4 border-primary w-48 -z-50 group-hover:z-50 opacity-0 group-hover:opacity-100 top-16 transition-all ease-in-out duration-500 left-0">
                <ul class="flex flex-col gap-3 text-base p-5 font-bold">
                  <li><RouterLink to="/" class=" hover:border-b-2 transition-all ease-in-out duration-300 "> Shop 1 </RouterLink></li>
                  <li><RouterLink to="/" class="hover:border-b-2 transition-all ease-in-out duration-300 ">Shop 2</RouterLink></li>
                  <li><RouterLink to="/" class="hover:border-b-2 transition-all ease-in-out duration-300"> Shop 3</RouterLink></li>
                  <li><RouterLink to="/" class="hover:border-b-2 transition-all ease-in-out duration-300">Shop 4</RouterLink></li>
                </ul>
              </div>
            </li>
            <li class=" text-base font-semibold hover:bg-primary  p-3  transition-all ease-in-out duration-500" >
              <RouterLink to="/client" class="text-white hover:border-b-2 transition-all ease-in-out duration-500">Our Clients</RouterLink>
            </li>
            <li class=" text-base font-semibold hover:bg-primary  p-3  transition-all ease-in-out duration-500" >
              <RouterLink to="/career" class="text-white hover:border-b-2 transition-all ease-in-out duration-500">Careers</RouterLink>
            </li>
            <li class=" text-base font-semibold hover:bg-primary  p-3  transition-all ease-in-out duration-500" >
              <RouterLink to="/media" class="text-white hover:border-b-2 transition-all ease-in-out duration-500">News & Media</RouterLink>
            </li>
            <li class=" text-base font-semibold hover:bg-primary  p-3  transition-all ease-in-out duration-500" >
              <RouterLink to="/contact" class="text-white hover:border-b-2 transition-all ease-in-out duration-500">Contacts</RouterLink>
            </li>
          </ul>
        </div>
      </div>
    </Container>
  </section>

</template>