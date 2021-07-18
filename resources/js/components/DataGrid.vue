<template>

  <div class="w-full mx-auto z-10">
    <!-- Search Panel -->
    <div>
      <div class="bg-white flex items-center rounded-3x shadow-xl">
        <input v-model="search" class="rounded-l-full w-full py-4 px-6 text-gray-500 leading-tight focus:outline-none" id="search" type="text" placeholder="Search">
      </div>
    </div>
    <!-- List Items -->
    <div v-for="(item, index) in filteredData" :key="index">
      <div class="flex flex-col">
        <div class="bg-white hover:bg-gray-100 border border-white hover:border-gray-100 shadow-lg rounded-3xl p-4 m-4">
          <div class="flex-none sm:flex text-gray-500 leading-tight">
            {{ item.name }}
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
  
  import axios from 'axios';

  export default {
    name: "DataGrid",
    data() {
        return {   
            data: [],   
            search: '',      
        }
    },
    created: function () {
      this.getData();
    },
    computed: {
      filteredData() {
        return this.data.filter(item => {
          //TODO: Filter on multiple items
          return item.name.toLowerCase().includes(this.search.toLowerCase())
        })
      },
    },
    methods: {
      async getData() {
        const { data } = await axios.get('/api/data')
        this.data = data
      }
    }    
  }

</script>
