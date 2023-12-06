import './bootstrap';
import { createApp } from 'vue';
import HelloWorld from '@/components/HelloWorld.vue';
import router from "./router";

//Crear aplicación

createApp(HelloWorld).use(router).mount("#app");
