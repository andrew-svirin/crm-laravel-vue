
// Load all of this project's JavaScript dependencies which includes Vue and other libraries.
require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import BootstrapVue from 'bootstrap-vue';

// Allows use in components routes features.
Vue.use(VueRouter);
// Allows use in components bootstrap features.
Vue.use(BootstrapVue);

// Register main component. Use it in html page to bind application.
Vue.component('app', require('./components/app.vue').default);

import Home from './components/home.vue';
import Login from './components/login.vue';
const Register = {template: '<div>Register</div>'};
const Contact = {template: '<div>Contact</div>'};
// Create the router instance and pass the `routes` option.
const router = new VueRouter({
    mode: 'history',
    routes: [
        {path: '/', component: Home},
        {path: '/login', component: Login},
        {path: '/register', component: Register},
        {path: '/contact', component: Contact}
    ] // short  for `routes: routes`
});

/**
 * Create a fresh Vue application instance and attach it to the page.
 */
const app = new Vue({
    el: '#app',
    router
}).$mount('#app');
