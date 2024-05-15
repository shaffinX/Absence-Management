import { createApp } from 'vue';
import App from './App.vue';
import router from './Routes.js';
import 'bootstrap/dist/css/bootstrap.min.css'

const app = createApp(App);
app.config.globalProperties.$api_url = 'http://192.168.100.59/abs';
app.use(router);
app.mount('#app');
