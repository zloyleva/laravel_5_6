import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomeComponent from './components/HomeComponent'
import LoginComponent from './components/Auth/LoginComponent'
import LogoutComponent from './components/Auth/LogoutComponent'

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
    {
        path: '/logout',
        name: 'logout',
        component: LogoutComponent
    }
];

const router = new VueRouter({
   routes
});

export default router;