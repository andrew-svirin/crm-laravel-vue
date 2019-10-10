<template>
   <b-navbar toggleable="lg" type="dark" variant="info">

      <b-navbar-brand to="/">CRM</b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
         <b-navbar-nav>
            <router-link class="nav-link" to="/contact" v-if="isAuthenticated">Contact</router-link>
         </b-navbar-nav>
         <!-- Right aligned nav items -->
         <b-navbar-nav class="ml-auto">
            <router-link class="nav-link" to="/login" v-if="!isAuthenticated">Login</router-link>
            <router-link class="nav-link" to="/register" v-if="!isAuthenticated">Register</router-link>
            <b-nav-item class="nav-link" v-on:click='onLogout' v-if="isAuthenticated">Logout</b-nav-item>
         </b-navbar-nav>
      </b-collapse>
   </b-navbar>
</template>
<script>
    import {mapGetters} from 'vuex';

    export default {
        name: 'Menu',
        computed: mapGetters(['isAuthenticated']),
        methods: {
            async onLogout(evt) {
                evt.preventDefault();
                this.$store.dispatch('logout');
                this.$router.push('/');
            }
        }
    }
</script>
