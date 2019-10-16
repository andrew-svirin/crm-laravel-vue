<template>
   <section class="section">
      <div class="col-lg-6 offset-lg-3">
         <h1>Create new project</h1>
      </div>
      <div class="col-lg-6 offset-lg-3">
         <b-form @submit="onSubmit">
            <div class="alert alert-danger" v-if="has_error">
               <p>Has error.</p>
            </div>
            <b-form-group id="input-group-1" label="Title:" label-for="input-1">
               <b-form-input
                     id="input-1"
                     v-model="form.title"
                     required
                     placeholder="Enter title"
               ></b-form-input>
            </b-form-group>

            <b-form-group id="textarea-group-2" label="Description:" label-for="textarea-2">
               <b-form-textarea
                     id="textarea-2"
                     v-model="form.description"
                     placeholder="Enter description..."
                     rows="4"
                     max-rows="6"
               ></b-form-textarea>
            </b-form-group>

            <b-form-group id="input-group-3" label="Status:" label-for="select-3">
               <b-form-select
                     id="select-3"
                     v-model="form.status"
                     :options="statusOptions"
               ></b-form-select>
            </b-form-group>

            <b-button type="submit" variant="primary">Submit</b-button>
         </b-form>
      </div>
   </section>
</template>
<script>
    import Project from '../services/Project.js';

    export default {
        data() {
            return {
                form: {
                    id: '',
                    title: '',
                    description: '',
                    status: '',
                },
                has_error: false,
                statusOptions: ['', 'On Development', 'On Estimate', 'On Hold'],
            }
        },
        methods: {
            async onSubmit(evt) {
                evt.preventDefault();
                try {
                    // Generate UUID for Project.
                    this.form.id = this.$uuid.v5(this.form.title, '6ba7b810-9dad-11d1-80b4-00c04fd430c8');
                    const response = await Project.create(this.form);
                    console.log('Project was created', response);
                    this.$router.push('/projects');
                } catch (error) {
                    this.show = true;
                    console.log('Form error', error);
                }
            }
        }
    }
</script>