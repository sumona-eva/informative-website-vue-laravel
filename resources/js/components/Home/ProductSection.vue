<script setup>

import Container from "@/components/Layouts/Container.vue";
import HeadLine from "@/components/HeadLine.vue";
import ProductCard from "@/components/ProductCard.vue";
</script>

<template>
  <section class="bg-gray-100 pb-2  0">
    <Container>
      <HeadLine>
        Featured Products
      </HeadLine>
      <div class="flex flex-wrap ">
        <div class="w-1/4 px-4 mb-8" v-for="item in 8">
          <ProductCard />
        </div>
      </div>
    </Container>
  </section>
</template>