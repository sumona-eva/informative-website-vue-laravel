<template>
    <AppLayout>
        <div class="flex flex-wrap -mx-1">
            <div class="w-1/2 px-1 mb-2">
                <div class="w-full bg-secondary p-2">
                    <h3>Home About Company</h3>
                    <div>
                        <label for="company-title">Title</label>
                        <textarea class="w-full p-2 rounded-lg bg-transparent border focus:outline-none focus:ring-primary"></textarea>
                    </div>
                    <div>
                        <label for="paragraph">Text</label>
                        <textarea class="w-full h-20 p-2 rounded-lg bg-transparent border focus:outline-none focus:ring-primary"></textarea>
                        <div class="text-end">
                            <button class="bg-primary text-xs px-3 py-1.5 text-white rounded">Add more</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-1/2 px-1 mb-2">
                <div class="w-full bg-secondary p-2">
                    <h3>Home About Company</h3>
                    <div>
                        <label for="company-title">Title</label>
                        <textarea class="w-full p-2 rounded-lg bg-transparent border focus:outline-none focus:ring-primary"></textarea>
                    </div>
                    <div>
                        <label for="paragraph">Text</label>
                        <textarea class="w-full h-20 p-2 rounded-lg bg-transparent border focus:outline-none focus:ring-primary"></textarea>
                        <div class="text-end">
                            <button class="bg-primary text-xs px-3 py-1.5 text-white rounded">Add more</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-1/2 px-1 mb-2">
                <div class="w-full bg-secondary p-2">
                    <div class="flex items-center gap-3">
                        <h3 class="text-2xl">Stats</h3>
                        <button @click="addStats" class="bg-primary p-1 rounded text-white text-xs">Add more</button>
                    </div>
                    <div class="flex items-center" v-for="(item, index) in content.stats">
                        <div class="w-2/3 px-1">
                            <label for="company-title">Key</label>
                            <input v-model="item.key" type="text" class="w-full p-2 rounded bg-transparent border focus:outline-none focus:ring-primary">
                        </div>
                        <div class="w-1/3 px-1">
                            <div class="flex  items-center justify-between">
                                <label for="company-title">Value</label>
                                <button @click="removeStats(index)" class=" bg-primary p-1 rounded text-white text-xs">Remove</button>
                            </div>
                            <input v-model="item.key" type="text" class="w-full p-2 rounded bg-transparent border focus:outline-none focus:ring-primary">
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-1/2 px-1 mb-2">
                <div class="w-full bg-secondary p-2">
                    <h3 class="text-2xl">Mission</h3>
                    <div class="flex">
                        <div class="w-2/3 px-1">
                            <label for="company-title">Text</label>
                            <textarea class="w-full h-20 p-2 rounded-lg bg-transparent border focus:outline-none focus:ring-primary"></textarea>
                        </div>
                        <div class="w-1/3 px-1">
                            <label for="company-title">Image</label>
                            <label for="" class="border border-dashed rounded-md flex items-center justify-center   h-20">
                                <span>Upload Image</span>
                                <input type="file" class="hidden">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="w-full bg-secondary p-2">
                    <h3 class="text-2xl">Vision</h3>
                    <div class="flex">
                        <div class="w-2/3 px-1">
                            <label for="company-title">Text</label>
                            <textarea class="w-full h-20 p-2 rounded-lg bg-transparent border focus:outline-none focus:ring-primary"></textarea>
                        </div>
                        <div class="w-1/3 px-1">
                            <label for="company-title">Image</label>
                            <label for="" class="border border-dashed rounded-md flex items-center justify-center   h-20">
                                <span>Upload Image</span>
                                <input type="file" class="hidden">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-1/2 px-1 mb-2">
                <div class="w-full bg-secondary p-2">
                    <div class="flex items-center gap-3">
                        <h3 class="text-2xl">How We Works</h3>
                        <button @click="addHwo" class="bg-primary p-1 rounded text-white text-xs">Add more</button>
                    </div>
                    <div v-for="(item, index) in content.how_we_works" class="mb-5">
                        <label for="company-title">Title</label>
                        <input v-model="item.title" type="text" class="w-full p-2 rounded bg-transparent border focus:outline-none focus:ring-primary">
                        <label for="company-title">Text</label>
                        <textarea v-model="item.text" class="w-full p-2 rounded-lg bg-transparent border focus:outline-none focus:ring-primary"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script setup lang="ts">
import {ref, onMounted} from "vue";
import useAxios from '@/composables/useAxios.js';

const addStats = () => {
    content.value.stats.push({
        key:null,
        value:null,
    })
}
const removeStats = (index) => content.value.stats.splice(index, 1);

const addHwo = () => {
    content.value.how_we_works.push({
        title:null,
        text:null,
    })
}
const removeaddHwo = (index) => content.value.how_we_works.splice(index, 1);


const content = ref({
    about_company: [
        {
            title:null,
            items: [],
        }
    ],
    stats: [
        {
            key:null,
            value:null,
        }
    ],
    how_we_works: [
    {
        title:null,
        text:null
    }
    ],
    mission: [
        {
        text:null,
        image:null,
    }
    ],
    vision: [
        {
            text:null,
            image:null,
        }
    ]
})
</script>
