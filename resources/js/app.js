// app.js
import Vue from 'vue';
import App from './App.vue';
import router from './router'; // imported router.js we created above
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap';

new Vue({
    el: '#app',
    router, // to use router
    render: h => h(App)
});
