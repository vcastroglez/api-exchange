// router.js
import Vue from 'vue';
import Router from 'vue-router';
import Welcome from './views/Welcome.vue';

Vue.use(Router);

const routes = [
    {
        path: '/',
        name: 'welcome',
        component: Welcome,
    },
    { // new route for our categories page
        path: '/request/:id',
        component: () => import('./components/request/Request'), // Vue we just created
    },
];

const router = new Router({
    routes: routes,
    linkActiveClass: 'active',
    mode: "history"
});

export default router;
