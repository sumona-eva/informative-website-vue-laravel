<script setup>
    import { inject } from 'vue';
    const data = inject('data');
</script>
<template>
    <section class="py-6 lg:py-20">
        <Container>
            <h4 class="section-title">How We Works</h4>
            <div class="flex flex-wrap -mx-2 py-10">
            <div class="w-full lg:w-1/3 px-2 mb-6" v-for="(step, index) in data?.work_step">
                <div class="px-4 py-10 bg-gray-900">
                <div class="pb-5 border-b border-gray-700">
                    <h4 class="text-2xl text-center text-primary mb-2">Step 0{{ index+1 }}</h4>
                    <h3 class="text-3xl font-semibold text-center">{{ step?.title }}</h3>
                </div>
                <div class="pt-5">
                    <p class="text-xl text-center font-medium">{{ step?.description }}</p>
                </div>
                </div>
            </div>
            </div>
        </Container>
    </section>
</template>