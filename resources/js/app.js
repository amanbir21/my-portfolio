import './bootstrap';
import '../css/app.css'; 
import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import { Motion } from "@motionone/vue";

// 1. Standard Vue Setup (KEEP THIS)
const app = createApp(App);
app.use(router);
app.component('Motion', Motion); // Register Motion globally here
app.mount('#app');

// 2. DELETE OR COMMENT OUT EVERYTHING BELOW THIS (The Inertia Section)
/*
createInertiaApp({
  ...
});
*/
