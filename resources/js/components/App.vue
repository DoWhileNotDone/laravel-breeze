<template>
    <div class="flex items-center justify-center">
      <login v-if="!authorised" @user_authorised=" authorised = true"></login>
      <data-grid v-else></data-grid>      
    </div>
</template>

<script>

  import DataGrid from './DataGrid.vue'
  import Login from './Login.vue'
  
  export default {
    name: "App",
    components: {
      DataGrid, 
      Login 
    },
    data() {
        return {            
            authorised: false
        }
    },
  }

</script>
