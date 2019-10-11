<template>
   <section class="section">
      <b-jumbotron header="CRM" lead="Manage your projects.">
         <div v-if="!isAuthenticated">
            <p>Login to have access.</p>
            <router-link class="btn btn-primary btn-lg" role="button" to="/login">Login</router-link>
         </div>
         <div v-if="isAuthenticated">
            <router-link class="btn btn-primary btn-lg" role="button" to="/members">Members</router-link>
            <router-link class="btn btn-primary btn-lg" role="button" to="/projects">Projects</router-link>
         </div>
      </b-jumbotron>
   </section>
</template>
<script>
    import {mapGetters} from 'vuex';

    export default {
        computed: mapGetters(['isAuthenticated'])
    }
</script>
