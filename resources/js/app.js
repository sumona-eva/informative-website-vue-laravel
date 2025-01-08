
import {createApp} from 'vue'
import {createPinia} from 'pinia'
import AppLayout from '@/components/Layouts/AppLayout.vue';
import VSelect from "vue-select";
import "vue-select/dist/vue-select.css";
import App from './App.vue'
import router from './router/index.js'
import Icon from '@/components/Icon.vue';
import "vue-toastification/dist/index.css";
import Container from '@/components/Layouts/Container.vue';
import { createDataProvider } from '@/plugins/dataProvider.js';

import AOS from 'aos'
import 'aos/dist/aos.css'

import 'summernote/dist/summernote-lite.css';
import 'summernote/dist/summernote-lite.min.js';
import '@/assets/css/app.css'
import "vue3-toastify/dist/index.css";


const dataProvider = createDataProvider();

import $ from 'jquery';
import IconButton from '@/components/IconButton.vue';
window.$ = window.jQuery = $;

const app = createApp(App)
app.use(AOS.init());
app.use(createPinia())
    .use(router)
    .provide('data', dataProvider.data)
    .component('IconButton', IconButton)
    .component('AppLayout', AppLayout)
    .component("Select", VSelect)
    .component('Icon', Icon)
    .component('Container', Container)
    .mount('#app')

