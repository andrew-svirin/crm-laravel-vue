<template>
   <section class="section" style="margin-top: 20px">
      <div class="col-lg-6 offset-lg-3">
         <h3>Estimate</h3>
         <b-list-group>
            <b-list-group-item v-for="mailstone in mailstones" v-bind:key="mailstone.id">
               <span>{{ mailstone.title }}</span>
               <span v-if="mailstone.description !== ''">({{ mailstone.description }})</span>
               <span v-if="mailstone.hours !== ''">({{ mailstone.hours }})</span>
            </b-list-group-item>
         </b-list-group>
         <b-form @submit="addMailstone" style="margin-top: 12px">
            <b-button type="submit" variant="primary">Add Mailstone</b-button>
         </b-form>
      </div>
   </section>
</template>
<script>

    export default {
        data() {
            return {
                mailstones: [],
            }
        },
        mounted() {
            this.fetchEstimate();
        },
        methods: {
            fetchEstimate() {
                this.mailstones.push({id: 1, title: "Some mailstone 1", description: "Some description", hours: 10});
                this.mailstones.push({id: 2, title: "Some mailstone 2", description: "Some description", hours: 15});
                this.mailstones.push({id: 3, title: "Some mailstone 23", description: "", hours: 20});
            },
            addMailstone(evt) {
                evt.preventDefault();
                this.mailstones.push({id: 3, title: "Some mailstone 23", description: "", hours: 20});
                this.saveEstimate();
            },
            saveEstimate() {

            }
        },
    }
</script>