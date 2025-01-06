<script setup>

import ServiceCard from "@/components/ServiceCard.vue";
</script>

<template>
    <section class="mb-20">
        <Container>
          <h2 class="text-2xl lg:text-3xl font-semibold text-center text-primary my-5">Our Services</h2>
            <div class="flex flex-wrap -mx-2">
                <div class="w-full lg:w-1/3 px-2 mb-4" v-for="item in 3">
                    <ServiceCard   />
                </div>
            </div>
        </Container>
    </section>
</template>