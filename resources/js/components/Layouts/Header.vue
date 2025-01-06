<script setup lang="ts">
import Button from "@/components/Button.vue";
import TopHeader from "@/components/Layouts/TopHeader.vue";
import NavBar from "@/components/Layouts/NavBar.vue";

</script>

<template>
  <header class="hidden lg:block">
    <nav class="relative">
      <span class="absolute flex items-center bg-[#CD986C] sidepart w-[400px] h-[145px] left-0 right-0 bottom-0 top-0">
       <Container>
        <img class="size-28" src="@/assets/images/img/logo.png" alt="">
       </Container>
      </span>
      <div class="">
          <TopHeader />
          <NavBar />
      </div>
    </nav>
  </header>
</template>
<style scoped>
  .sidepart{
    clip-path: polygon(0 1%, 100% 0, 80% 99%, 0% 100%);
  }
</style>