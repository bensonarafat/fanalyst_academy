
import App from "./Layout/App.vue"
import './bootstrap';
import { createApp } from 'vue';


const app = createApp(App)

app.config.globalProperties.userId = document.querySelector("meta[name='user_id']").getAttribute('content');

app.mount('#app');

