<template>
   <section class="section" style="margin-top: 20px">
      <div class="col-lg-6 offset-lg-3">
         <h3>Estimate</h3>
         <b-list-group>
            <b-list-group-item v-for="mailstone in value.mailstones" v-bind:key="mailstone.id">
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
        props: ['value'],
        methods: {
            addMailstone(evt) {
                evt.preventDefault();
                this.value.mailstones.push({title: "Some mailstone 23", description: "", hours: 20});
                this.saveEstimate();
            },
            saveEstimate() {
                console.log('saveEstimate');
            }
        },
    }
</script>