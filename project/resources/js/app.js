// Load all of this project's JavaScript dependencies which includes Vue and other libraries.
require('./bootstrap');
import Vue from 'vue';
// Allows using states and store them.
import store from './store';
// Allows use in components routes features.
import router from './router';
// Allows use i18 features.
import i18n from './i18n';
// Allows use in components bootstrap features.
import BootstrapVue from 'bootstrap-vue';
// Allows use in components UUID features.
import UUID from 'vue-uuid';

Vue.use(BootstrapVue);
Vue.use(UUID);

// Register main component. Use it in html page to bind application.
Vue.component('app', require('./components/App.vue').default);

/**
 * Create a fresh Vue application instance and attach it to the page.
 */
const app = new Vue({
    el: '#app',
    router,
    store,
    i18n,
}).$mount('#app');
