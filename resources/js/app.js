// app.js
import Vue from 'vue';
import App from './App.vue';
import router from './router'; // imported router.js we created above
import { BootstrapVue } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
new Vue({
    el: '#vue',
    router, // to use router
    render: h => h(App)
});
