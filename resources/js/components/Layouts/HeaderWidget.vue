<script setup>
      defineProps({
        label:String,
        value:String,
        icon:String,
      })
</script>

<template>
    <div class="flex gap-3 text-black">
      <Icon :name="icon" class="text-4xl" />
      <div class="flex flex-col">
        <p class="text-xs font-semibold">{{label}}</p>
        <p class="text-base  font-semibold">{{value}}</p>
      </div>
    </div>

</template>