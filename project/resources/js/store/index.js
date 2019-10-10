import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        api_token: localStorage.getItem('api_token') || null,
        user: {},
    },
    getters: {
        isAuthenticated(state) {
            return state.api_token !== null;
        },
        getUser(state) {
            return state.user;
        },
    },
    mutations: {
        login(state, api_token) {
            state.api_token = api_token;
        },
        logout(state) {
            state.api_token = null;
        },
    },
    actions: {
        async login({commit}, api_token) {
            commit('login', api_token);
            localStorage.setItem('api_token', api_token);
        },
        async logout({commit}) {
            commit('logout');
            localStorage.removeItem('api_token')
        },
    }
});

export default store;