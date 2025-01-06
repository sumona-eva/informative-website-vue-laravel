<script setup>
import GuestLayout from "@/components/Layouts/GuestLayout.vue";
import Container from "@/components/Layouts/Container.vue";
import useAxios from "@/composables/useAxios.js";
import {ref, watch} from "vue";
import {inject} from "vue";
const data = inject("data");
const {loading, error, sendRequest} = useAxios();

const selectedCat = ref(null);
const projects = ref(null);
const getProjects = async () => {
  const categoryId = selectedCat.value?.id || null;
  const response = await sendRequest({
    method: 'get',
    url: `/frontend/project`,
    params:{
      category_id: categoryId,
    }
  })
  if(response){
    projects.value = response.data;
  }
}

watch(selectedCat, getProjects, {deep: true});
</script>

<template>

  <GuestLayout>
    <Container>

      <section class="relative lg:py-10 rounded ">
        <h2 class="text-3xl lg:text-6xl font-bold text-center">Our News & Media</h2>
        <span class="absolute w-full h-full left-0 right-0 top-0 bottom-0"></span>
        <div class="relative z-10 pt-10  text-center font-bold w-full max-w-xl mx-auto text-white">
<!--          <Select-->
<!--              class="cursor-pointer"-->
<!--              label="name"-->
<!--              v-if="data?.categories"-->
<!--              :options="data?.categories"-->
<!--              v-model="selectedCat"-->
<!--              placeholder="Categories" >-->
<!--          </Select>-->
        </div>
      </section>
    </Container>

    <section>
      <Container>
        <div class="flex items-center justify-between mb-8">
          <h2 class="text-xl lg:text-4xl font-semibold">Event Pictures</h2>
        </div>
        <div  v-if="loading" class="grid grid-cols-2 lg:grid-cols-4 gap-3 mb-20">
          <div class="w-full h-36 lg:h-64 bg-slate-200 animate-pulse" v-for="ietm in 12"></div>
        </div>
        <div v-else class="grid grid-cols-2 lg:grid-cols-4 gap-3 mb-20" >
          <RouterLink to="/" class="bg-slate-200 relative group h-36 lg:h-64 w-full overflow-hidden" v-for="item in 12">
            <img class="w-full h-full group-hover:scale-110 transition-all ease-in-out duration-500 object-cover" src="https://pima.com.bd/images/Igloo%203.jpg" alt="">
            <div class="w-full min-h-16 absolute -bottom-16 group-hover:bottom-0 left-0 right-0 bg-black/60 p-4  transition-all ease-in-out duration-500">
              <p class="text-white">Event Name: Foundation Day</p>
            </div>
          </RouterLink>
        </div>
      </Container>
    </section>
  </GuestLayout>
</template>



<style scoped>

</style>
