<script setup>
    import HeaderWidget from "@/components/Layouts/HeaderWidget.vue";
</script>

<template>
  <section class="">
    <Container>
      <div class="flex ">
        <div class="w-1/3"></div>
        <div class="w-2/3">
          <div class="flex justify-end gap-5 py-5">
            <div class="border-r-2 pr-7">
              <HeaderWidget label="Call Us Now" icon="line-md:phone-call-loop" value="+458 654 528" />
            </div>
            <div class="border-r-2 pr-7">
              <HeaderWidget label="Send Us Mail" icon="lucide:mail-open" value="info@gmail.com" />
            </div>
            <div>
              <HeaderWidget label="Office Time" icon="ic:baseline-access-time" value="10:00 Am - 06:00 Pm" />
            </div>
          </div>
        </div>
      </div>
    </Container>
  </section>

</template>