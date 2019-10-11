import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from '../components/Home.vue';
import Login from '../components/Login.vue';
import Contact from '../components/Contact.vue';
import Register from '../components/Register.vue';
import Members from '../components/Members.vue';
import Projects from '../components/Projects.vue';

// Create the router instance and pass the `routes` option.
const router = new VueRouter({
    mode: 'history',
    routes: [
        {path: '/', component: Home},
        {path: '/home', component: Home},
        {path: '/login', component: Login},
        {path: '/register', component: Register},
        {path: '/contact', component: Contact},
        {path: '/members', component: Members},
        {path: '/projects', component: Projects},
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