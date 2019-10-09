<template>
   <div class="container-fluid">
      <div>
         <b-navbar toggleable="lg" type="dark" variant="info">

            <b-navbar-brand to="/">CRM</b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
               <b-navbar-nav>
                  <router-link class="nav-link" to="/contact">Contact</router-link>
               </b-navbar-nav>
               <!-- Right aligned nav items -->
               <b-navbar-nav class="ml-auto">
                  <router-link class="nav-link" to="/login">Login</router-link>
                  <router-link class="nav-link" to="/register">Register</router-link>
               </b-navbar-nav>
            </b-collapse>
         </b-navbar>
      </div>
      <br/>
      <router-view/>
   </div>
</template>
<script>
    export default {
        name: 'App'
    }
</script>
