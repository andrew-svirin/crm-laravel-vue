<template>
   <section class="section">
      <div class="col-lg-6 offset-lg-3">
         <h1>Project {{ project.id }} - {{ project.title }}</h1>
      </div>
      <div class="col-lg-6 offset-lg-3">
         {{ project.description }}
      </div>
      <estimate v-model="project"></estimate>
      <projectMembers v-model="project"></projectMembers>
   </section>
</template>
<script>
    import Project from '../services/Project.js';
    import Estimate from '../components/Estimate.vue';
    import ProjectMembers from '../components/ProjectMembers.vue';

    export default {
        components: {
            Estimate,
            ProjectMembers,
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