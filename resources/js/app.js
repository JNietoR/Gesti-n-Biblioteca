import './bootstrap';
import '../css/app.css';
import { createApp } from 'vue';
import HelloWorld from '@/components/HelloWorld.vue';
import BookList from '@/components/BookList.vue';
import router from "./router";

//Crear aplicación

createApp(HelloWorld).use(router).mount("#app");
