<template>
   <div>
      <div class="col-lg-6 offset-lg-3">
         <h1>Login</h1>
      </div>
      <div class="col-lg-6 offset-lg-3">
         <b-form @submit="onSubmit" v-if="show">
            <b-form-group id="input-group-1" label="Email address:" label-for="input-1">
               <b-form-input
                     id="input-1"
                     v-model="form.email"
                     type="email"
                     required
                     placeholder="Enter email"
               ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-2" label="Password:" label-for="input-2">
               <b-form-input
                     id="input-2"
                     v-model="form.password"
                     required
                     placeholder="Enter password"
                     type="password"
               ></b-form-input>
            </b-form-group>

            <b-button type="submit" variant="primary">Submit</b-button>
         </b-form>
      </div>
   </div>
</template>
<script>
    export default {
        name: 'Login',
        data() {
            return {
                form: {
                    email: '',
                    password: '',
                },
                show: true
            }
        },
        methods: {
            onSubmit(evt) {
                evt.preventDefault();
                alert(JSON.stringify(this.form));
            }
        }
    }
</script>