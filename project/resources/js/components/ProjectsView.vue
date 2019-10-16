<template>
   <section class="section">
      <div class="col-lg-6 offset-lg-3">
         <h1>Project {{ project.id }} - {{ project.title }}</h1>
      </div>
      <div class="col-lg-6 offset-lg-3">
         {{ project.description }}
      </div>
      <estimate></estimate>
   </section>
</template>
<script>
    import Project from '../services/Project.js';
    import estimate from '../components/Estimate.vue';

    export default {
        components: {
            estimate
        },
        data() {
            return {
                project: {},
            }
        },
        mounted() {
            this.fetchProject();
        },
        methods: {
            fetchProject() {
                // Make server request for fetch item details.
                return Project.load(this.$route.params['id']).then((response) => {
                    this.project = response.data.data;
                    return this.project;
                });
            },
        },
    }
</script>