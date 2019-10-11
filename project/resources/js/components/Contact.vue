<template>
   <section class="section">
      <div class="col-lg-6 offset-lg-3">
         <h1>Contact</h1>
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
                     type="email"
                     required
                     placeholder="Enter title"
               ></b-form-input>
            </b-form-group>

            <b-form-group id="textarea-group-2" label="Message:" label-for="textarea-2">
            <b-form-textarea
                  id="textarea-2"
                  v-model="form.message"
                  placeholder="Enter message..."
                  rows="4"
                  max-rows="6"
            ></b-form-textarea>
            </b-form-group>

            <b-button type="submit" variant="primary">Submit</b-button>
         </b-form>
      </div>
   </section>
</template>
<script>

    export default {
        data() {
            return {
                form: {
                    title: '',
                    message: '',
                },
                has_error: false
            }
        },
        methods: {
            async onSubmit(evt) {
                evt.preventDefault();
            }
        }
    }
</script>