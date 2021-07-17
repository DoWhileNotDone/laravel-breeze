<template>

  <div class="w-full max-w-xs ">
    <form class="bg-white shadow-md rounded mt-8 px-8 pt-6 pb-8 mb-4" action="#" @submit.prevent="handleLogin">
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
          Email
        </label>
        <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" v-model="formData.email" placeholder="Email">
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
          Password
        </label>
        <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" v-model="formData.password" placeholder="Password">
      </div>
      <div class="flex items-center justify-between">
        <button @click="handleLogin" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
          Sign In
        </button>
      </div>
    </form>
  </div>
</template>

<script>
  
  import axios from 'axios';

  export default {
    name: "Login",
    data() {
        return {            
            formData: {
                email: '',
                password: ''
            }
        }
    },
    methods: {
      handleLogin() {
        axios.get('/sanctum/csrf-cookie').then(response => {
          axios.post('/login', this.formData).then(response => {
            this.$emit('user_authorised');
          }).catch(error => console.log(error)); // credentials didn't match
        });
      },
    }    
  }

</script>
