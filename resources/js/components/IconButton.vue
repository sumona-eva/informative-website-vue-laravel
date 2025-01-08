<script setup lang="ts">
    defineProps<{ icon: string, label: string }>();
</script>
<template>
    <button v-if="label" class="group px-3 ps-2.5 py-1 border border-gray-700 inline-flex items-center justify-center rounded-md text-gray-500 hover:border-gray-300 gap-1 hover:text-gray-200 text-sm">
        <Icon v-if="icon" :name="icon" class="text-gray-400 group-hover:text-gray-100" />
        {{ label }}
    </button>
     <button v-else class="group w-8 h-8 border border-gray-700 flex items-center justify-center rounded-md hover:border-gray-300">
        <Icon :name="icon"  class="text-gray-400 group-hover:text-gray-100" />
    </button>
</template>