<template>
    <div>
      Data Grid
    </div>
</template>

<script>
  
  import axios from 'axios';

  export default {
    name: "DataGrid",
    data() {
        return {   
            data: [],         
        }
    },
    created: function () {
      this.getData();
    },
    methods: {
      getData() {
        axios.get('/api/data').then(({ data }) => this.data = data);
      }
    }    
  }

</script>
