<template>
      <div class="container">
      <nav class="nav">
            <router-link class="nav-link" to="/">Home</router-link>
            <router-link class="nav-link" to="/login">Login</router-link>
            <router-link class="nav-link" to="/register">Register</router-link>
            <router-link class="nav-link" to="/contact">Contact</router-link>
      </nav>
      <router-view/>
      </div>
</template>
<script>
    export default {
        name: 'App'
    }
</script>
