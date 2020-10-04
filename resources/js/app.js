import Vue from "vue";
import App from "./App.vue";
window.axios = require("axios");

import router from "./router/router"

new Vue({
    router,
    render: h => h(App)
}).$mount("#app");

