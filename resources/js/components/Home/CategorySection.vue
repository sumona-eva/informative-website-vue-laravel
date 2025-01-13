<script setup>

import Container from "@/components/Layouts/Container.vue";
import HeadLine from "@/components/HeadLine.vue";
import CategoryCard from "@/components/CategoryCard.vue";
</script>

<template>
  <section class="bg-gray-100 py-20">
      <Container>
          <HeadLine>
            Shop By Category
          </HeadLine>
        <div class="flex flex-wrap ">
          <div class="w-1/4 px-3 mb-5" v-for="item in 8">
              <CategoryCard />
          </div>
        </div>

      </Container>
  </section>
</template>