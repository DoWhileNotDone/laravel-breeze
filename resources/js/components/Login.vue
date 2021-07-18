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
        <button :disabled="submitted" @click="handleLogin" class="bg-blue-500 hover:bg-blue-700 disabled:bg-gray-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
          Sign In
        </button>
         <p v-if="not_recognised" class="text-red-500 text-xs italic">User details not recognised.</p>
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
            },
            submitted: false,
            not_recognised: false,
        }
    },
    methods: {
      async handleLogin() {
        this.submitted = true
        this.not_recognised = false
        try {
          await axios.get('/sanctum/csrf-cookie')
          await axios.post('/login', this.formData)
          this.$emit('user_authorised');
        } catch (error) {
            this.submitted = false
            this.not_recognised = true
            console.log(error)
        }
      },
    }    
  }

</script>
