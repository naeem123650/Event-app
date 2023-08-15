import "./bootstrap";

import { createApp } from "vue";
import App from "./App.vue";
import FloatingVue from "floating-vue";
import "floating-vue/dist/style.css";
import router from "./router";

createApp(App).use(router).use(FloatingVue).mount("#app");
