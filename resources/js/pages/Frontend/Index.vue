<script setup>
  import HeroSection from '@/components/Home/HeroSection.vue';
  import GuestLayout from "@/components/Layouts/GuestLayout.vue";
  import HistorySection from "@/components/Home/HistorySection.vue";
  import CoreSection from "@/components/Home/CoreSection.vue";
  import MessageSection from "@/components/Home/MessageSection.vue";
  import ServiceSection from "@/components/Home/ServiceSection.vue";
  import ChoosUsSection from "@/components/Home/ChoosUsSection.vue";
  import ClientSection from "@/components/Home/ClientSection.vue";
</script>
<template>
    <GuestLayout>
      <HeroSection />
      <HistorySection />
      <CoreSection />
      <MessageSection />
      <ServiceSection />
      <ChoosUsSection />
      <ClientSection />
    </GuestLayout>
</template>
