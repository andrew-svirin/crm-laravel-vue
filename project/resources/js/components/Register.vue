<template>
   <section class="section">
      <b-col class="col-lg-6 offset-lg-3">
         <h1>Register</h1>
      </b-col>
      <b-col class="col-lg-6 offset-lg-3">
         <b-form @submit="onSubmit">
            <div class="alert alert-danger" v-if="has_error">
               <p>Has error.</p>
            </div>

            <b-form-group id="input-group-1" label="Name:" label-for="input-1">
               <b-form-input
                     id="input-1"
                     v-model="form.name"
                     type="email"
                     required
                     placeholder="Enter name"
               ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-2" label="Email address:" label-for="input-2">
               <b-form-input
                     id="input-2"
                     v-model="form.email"
                     type="email"
                     required
                     placeholder="Enter email"
               ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-3" label="Password:" label-for="input-3">
               <b-form-input
                     id="input-3"
                     v-model="form.password"
                     required
                     placeholder="Enter password"
                     type="password"
               ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-4" label="Repeat Password:" label-for="input-4">
               <b-form-input
                     id="input-4"
                     v-model="form.repeat_password"
                     required
                     placeholder="Enter password again"
                     type="password"
               ></b-form-input>
            </b-form-group>

            <b-button type="submit" variant="primary">Submit</b-button>
         </b-form>
      </b-col>
   </section>
</template>
<script>
    export default {
        data() {
            return {
                form: {
                    name: '',
                    email: '',
                    password: '',
                    repeat_password: '',
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