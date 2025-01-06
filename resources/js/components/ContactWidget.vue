<script setup>
  import Icon from "@/components/Icon.vue";

  defineProps({
    title : String,
    value : String,
    icon : String,
  })
</script>

<template>
    <div class="flex items-center gap-3 ">
        <span class="flex items-center justify-center size-10 bg-secondary rounded-lg shadow-lg">
            <Icon :name="icon" class="text-white text-2xl"  />
        </span>
        <div>
          <h4 class="text-primary text-base font-bold mb-1">{{title}}</h4>
          <p class="text-primary text-xs max-w-40">{{value}}</p>
        </div>
    </div>
</template>