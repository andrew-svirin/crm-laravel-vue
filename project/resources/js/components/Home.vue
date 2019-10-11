<template>
   <section class="section">
      <b-jumbotron header="CRM" lead="Manage your projects.">
         <p>
            System provides ability for Managers to add manage projects and for Developers to vote projects and participate on development process.
         </p>
         <p>
            Vote is underlining the estimation incoming projects. After voting Manager can count average time on development.
         </p>
         <p>
            When project will be approved by Manager, Developers those voted will be ordered by estimation time.
            The lowest estimate by Developer will win and Developer will be proposed for begin development.
         </p>
         <p>
            If Developer is busy on current moment, then next Developer in order list will be proposed for development.
         </p>
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
