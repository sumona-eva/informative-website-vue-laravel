<script setup>

import Icon from "@/components/Icon.vue";
</script>

<template>
  <section class="bg-gray-100 py-2">
    <Container>
       <div class="flex">
         <div class="w-1/2">
           <div class="flex gap-1 items-center text-xs text-gray-500">
             <Icon name="ic:twotone-call" class="text-lg" />
             <p>Help Line : 01717833910, 01777-071673</p>
           </div>
         </div>
         <div class="w-1/2">
           <div>
                <ul class="flex justify-end text-sm text-gray-500 gap-3">
                  <li> Articles</li>
                  <span>|</span>
                  <li> Shop</li>
                  <span>|</span>
                  <li> Payment</li>
                  <span>|</span>
                  <li> Contact</li>
                </ul>
           </div>
         </div>
       </div>
    </Container>
  </section>

</template>