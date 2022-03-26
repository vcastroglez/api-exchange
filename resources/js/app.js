// app.js
window.axios = require('axios');

import Vue from 'vue';
import App from './App.vue';
import router from './router'; // imported router.js we created above
import store from './store';
import vuetify from './vuetify' // path to vuetify export
const bus = new Vue();
new Vue({
    el: '#vue',
    router, // to use router
    store,
    vuetify,
    render: h => h(App)
});

export {bus};
