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
String.prototype.hashCode = function() {
    var hash = 0, i, chr;
    if (this.length === 0) return hash;
    for (i = 0; i < this.length; i++) {
        chr   = this.charCodeAt(i);
        hash  = ((hash << 5) - hash) + chr;
        hash |= 0; // Convert to 32bit integer
    }
    return hash;
};
export {bus};
