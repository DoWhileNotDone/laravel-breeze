<template>
    <div>
      Hello World
      <login></login>
    </div>
</template>

<script>

  import Login from './Login.vue'
  
  export default {
    name: "App",
    components: { 
      Login 
    },
  }

</script>
