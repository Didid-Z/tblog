<template>
  <div id="app">
  <!-- <showblogs></showblogs> -->
    <!-- <addblog></addblog> -->
    <blogheader></blogheader>
    

    <router-view></router-view>
  </div>
</template> 

<script>


import addblog from './components/addblog'

import showblogs from './components/showblogs'

import blogheader from './components/blogheader'

import login from './components/login'


export default {    
  name: 'App',
  data(){
    return{
     
      

    }
  },
  components:{
    addblog,showblogs,blogheader
  },

 
  
}
</script> 

<style>


</style>
