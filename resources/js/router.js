// router.js
import Vue from 'vue';
import Router from 'vue-router';
import Dashboard from './views/Dashboard.vue';

Vue.use(Router);

const routes = [
    {
        path: '/',
        name: 'dashboard',
        component: Dashboard,
    },
    { // new route for our categories page
        path: '/request/:id',
        component: () => import('./components/request/Request'), // Vue we just created
    },,
    { // new route for our categories page
        path: '/variables/:id',
        component: () => import('./components/collection/variables/Variables'), // Vue we just created
    },
];

const router = new Router({
    routes: routes,
    linkActiveClass: 'active',
    mode: "history"
});

export default router;
