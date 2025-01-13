<script setup>

import Container from "@/components/Layouts/Container.vue";
</script>

<template>
    <section class="py-20">
        <Container>
            <div class="flex flex-wrap">
                <div class="w-full lg:w-1/2 px-10">
                    <div class="flex flex-col gap-7">
                      <p class="text-sm text-secondary border-b w-40 border-secondary font-normal pb-1">DR. MD YOUNUS ALI</p>
                      <h3 class="text-3xl font-semibold text-primary max-w-lg leading-normal">
                        Welcome to Dr Ali's Skin Magic Centre
                        Where Your Skin Health is Our Priority
                      </h3>
                      <p class="text-sm text-gray-500 font-normal max-w-3xl leading-snug">
                        I am Dr. MD Younus Ali, a dermatologist at Skin Magic Centre, dedicated to providing comprehensive care for all skin, hair, nail, oral cavity, sexual and allergic diseases. Our services also include treatments for childlessness, aesthetic and laser procedures, dermatocosmetic surgery, hair and tattoo removal, and fat loss treatments.
                      </p>
                      <div class="border-l-4 border-secondary bg-primary/15 p-8">
                          <p class="text-sm text-primary  leading-normal font-medium">
                            At Skin Magic Centre, we are committed to delivering personalized and effective solutions to enhance your skin health and overall well-being.
                          </p>
                      </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 relative">
                    <div class="relative w-full max-w-lg">
                      <img src="@/assets/images/img/doctor.png" class="w-full h-auto" alt="">
                      <span class="absolute w-full h-full top-0 bottom-0 right-0 left-0 bg-primary/20">
                      </span>
                    </div>
                    <div class="absolute top-0 right-0 w-2 h-44 bg-primary"></div>
                    <div class="absolute -bottom-10 right-0 z-10 bg-primary px-6 py-12 w-56 ">
                      <h2 class="text-white font-semibold text-2xl ">200 + <br> Patient Surgery</h2>
                    </div>
                </div>
            </div>
        </Container>
    </section>
</template>