import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomeComponent from './components/HomeComponent'
import LoginComponent from './components/Auth/LoginComponent'

const routes = [
    {
        path: '/',
        name: 'home',
        component: HomeComponent
    },
    {
        path: '/login',
        name: 'login',
        component: LoginComponent
    },
];

const router = new VueRouter({
   routes
});

export default router;