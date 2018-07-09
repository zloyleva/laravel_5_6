
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('chat-message', require('./components/ChatMessage'));
Vue.component('chat-log', require('./components/ChatLog'));
Vue.component('chat-composer', require('./components/ChatComposer'));
Vue.component('chat-main-component', require('./components/MainChatComponenet'));

const app = new Vue({
    el: '#app'
});
