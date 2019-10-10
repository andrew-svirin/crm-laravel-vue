// Load all of this project's JavaScript dependencies which includes Vue and other libraries.
require('./bootstrap');
import Vue from 'vue';
// Allows using states and store them.
import store from './store';
// Allows use in components routes features.
import router from './router';
import BootstrapVue from 'bootstrap-vue';

// Allows use in components bootstrap features.
Vue.use(BootstrapVue);

// Register main component. Use it in html page to bind application.
Vue.component('app', require('./components/App.vue').default);

/**
 * Create a fresh Vue application instance and attach it to the page.
 */
const app = new Vue({
    el: '#app',
    router,
    store,
}).$mount('#app');
