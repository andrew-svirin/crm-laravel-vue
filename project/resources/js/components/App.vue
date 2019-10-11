<template>
   <b-container>
      <navigationMenu></navigationMenu>
      <br/>
      <router-view/>
   </b-container>
</template>
<script>
    import navigationMenu from '../components/Menu.vue';

    export default {
        components: {
            navigationMenu
        }
    }
</script>
