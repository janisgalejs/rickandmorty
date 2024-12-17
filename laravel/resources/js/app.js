import './bootstrap';
import {createApp} from "vue";
import App from "./app/App.vue"
import router from "./app/router/router.js";
import 'bootstrap/dist/css/bootstrap.min.css'

createApp(App)
    .use(router)
    .mount('#app');
