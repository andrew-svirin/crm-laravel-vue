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
    import ProjectMember from '../services/ProjectMember';

    export default {
        props: ['value'],
        data() {
            return {
                form: {
                    id: '',
                    project_id: '',
                    member_id: '',
                },
                has_error: false,
            }
        },
        updated() {
            // Populate form by ProjectMember model attributes.
            this.form.id = this.$uuid.v5(this.form.member_id + '-' + this.form.project_id, '6ba7b810-9dad-11d1-80b4-00c04fd430c8');
            this.form.project_id = this.value.id;
        },
        methods: {
            async invoiceMember(evt) {
                try {
                    evt.preventDefault();
                    console.log('invoiceMember form', this.form);
                    const response = await ProjectMember.invoice(this.form);
                    this.saveMembers();
                } catch (error) {
                    console.log('Form error', error);
                }
            },
            saveMembers() {
                console.log('saveMembers');
            }
        },
    }
</script>