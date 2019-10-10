import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from '../components/Home.vue';
import Login from '../components/Login.vue';

const Register = {template: '<div>Register</div>'};
const Contact = {template: '<div>Contact</div>'};

// Create the router instance and pass the `routes` option.
const router = new VueRouter({
    mode: 'history',
    routes: [
        {path: '/', component: Home},
        {path: '/home', component: Home},
        {path: '/login', component: Login},
        {path: '/register', component: Register},
        {path: '/contact', component: Contact}
    ]
});

router.beforeEach((to, from, next) => {
    // redirect to login page if not logged in and trying to access a restricted page
    const publicPages = ['/login', '/register', '/', '/home'];
    const authRequired = !publicPages.includes(to.path);
    const loggedIn = localStorage.getItem('api_token');

    if (authRequired && !loggedIn) {
        return next('/login');
    }

    next();
});

export default router;