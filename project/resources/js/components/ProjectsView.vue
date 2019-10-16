<template>
   <section class="section">
      <div class="col-lg-6 offset-lg-3">
         <h1>Project {{this.$route.params['id']}} - {{ item.title }}</h1>
      </div>
      <div class="col-lg-6 offset-lg-3">
         {{ item.description }}
      </div>
   </section>
</template>
<script>
    import Project from '../services/Project.js';

    export default {
        data() {
            return {
                item: null,
            }
        },
        mounted() {
            this.fetchItem();
        },
        methods: {
            fetchItem() {
                // Make server request for fetch item details.
                return Project.load(this.$route.params['id']).then((response) => {
                    this.item = response.data.data;
                    return this.item;
                });
            },
        },
    }
</script>