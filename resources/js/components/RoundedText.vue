<script setup>
import {inject, ref} from 'vue';

const data = inject('data');
const videoPreview = ref(false);
</script>
<template>
    <div class="w-[500px] h-[500px] relative">
        <div id="circle" class="relative w-full h-full">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="300px" height="300px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" xml:space="preserve">
                <defs>
                    <path id="circlePath" d="M 150, 150 m -60, 0 a 60,60 0 0,1 120,0 a 60,60 0 0,1 -120,0 "/>
                </defs>
                <circle cx="150" cy="100" r="75" fill="none"/>
                <g>
                    <use xlink:href="#circlePath" fill="none"/>
                    <text class="fill-white font-normal">
                        <textPath xlink:href="#circlePath">Graphics • Design • Agency • Graphics • Design •</textPath>
                    </text>
                </g>
            </svg>
        </div>
        <div class="absolute top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 w-28 h-28  ">
            <button @click="videoPreview = true" class="w-full h-full flex items-center justify-center border border-gray-600 rounded-full">
                <Icon name="material-symbols:play-arrow" class="text-6xl text-primary" />
            </button>
                
        </div>
    </div>
    
    <div v-if="videoPreview" class="fixed top-0 left-0 right-0 bottom-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <button class="absolute right-10 top-32" @click="videoPreview = false">
            <Icon name="material-symbols-light:close-rounded" class="text-primary text-6xl" />
        </button>
        <div class=" bg-black w-[700px] h-[400px]" v-html="data?.setting?.yt_video_iframe"></div>
    </div>
</template>
<style scoped>
#circle { position: relative; overflow: hidden; }

#circle text {  font-size: 18px; font-weight: normal; }

#circle svg { position: absolute; width: 500px; height: 500px;
    top: 0;
    left: 0;

  -webkit-animation-name: rotate;
     -moz-animation-name: rotate;
      -ms-animation-name: rotate;
       -o-animation-name: rotate;
          animation-name: rotate;
  -webkit-animation-duration: 8s;
     -moz-animation-duration: 8s;
      -ms-animation-duration: 8s;
       -o-animation-duration: 8s;
          animation-duration: 8s;
  -webkit-animation-iteration-count: infinite;
     -moz-animation-iteration-count: infinite;
      -ms-animation-iteration-count: infinite;
       -o-animation-iteration-count: infinite;
          animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
     -moz-animation-timing-function: linear;
      -ms-animation-timing-function: linear;
       -o-animation-timing-function: linear;
          animation-timing-function: linear;

}

@-webkit-keyframes rotate {
    from { -webkit-transform: rotate(0); }
    to { -webkit-transform: rotate(360deg); }
}
@-moz-keyframes rotate {
    from { -moz-transform: rotate(0); }
    to { -moz-transform: rotate(360deg); }
}
@-ms-keyframes rotate {
    from { -ms-transform: rotate(0); }
    to { -ms-transform: rotate(360deg); }
}
@-o-keyframes rotate {
    from { -o-transform: rotate(0); }
    to { -o-transform: rotate(360deg); }
}
@keyframes rotate {
    from { transform: rotate(0); }
    to { transform: rotate(360deg); }
}



</style>