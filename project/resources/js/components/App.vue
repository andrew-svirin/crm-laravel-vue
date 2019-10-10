<template>
   <div class="container-fluid">
      <navigationMenu></navigationMenu>
      <br/>
      <router-view/>
   </div>
</template>
<script>
    import navigationMenu from '../components/Menu.vue';

    export default {
        name: 'App',
        components: {
            navigationMenu
        }
    }
</script>
