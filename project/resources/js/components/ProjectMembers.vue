<template>
   <section class="section" style="margin-top: 20px">
      <div class="col-lg-6 offset-lg-3">
         <h3>{{ $t("title.members") }}</h3>

         <p>{{ $t("message.invoice") }}</p>

         <b-list-group>
            <b-list-group-item v-for="member in value.members" v-bind:key="member.id">
               <span>{{ member.name }}</span> <span v-if="member.role !== ''">({{ member.role }})</span>
            </b-list-group-item>
         </b-list-group>
         <b-form @submit="invoiceMember" style="margin-top: 12px">
            <b-button type="submit" variant="primary">{{ $t("button.invoice") }}</b-button>
         </b-form>

      </div>
   </section>
</template>
<script>
    export default {
        props: ['value'],
        methods: {
            invoiceMember(evt) {
                evt.preventDefault();
                console.log('invoiceMember');
                this.saveMembers();
            },
            saveMembers() {
                console.log('saveMembers');
            }
        },
    }
</script>