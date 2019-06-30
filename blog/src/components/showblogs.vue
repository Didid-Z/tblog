<template>
  <div id="show-blogs">
      <h1>博客总览</h1>
      

      <input type="text" placeholder="search blog" v-model="search">
      <div id="blogs" v-for="blog in filteredBlogs">
          <router-link v-bind:to="'/blog/'+blog.id">
          
              <h2>{{blog.title}}</h2>

          </router-link>
          <article>{{blog.content}}</article>
         
         

      </div>
  
  </div>
</template> 

<script>




export default {    
  name: 'showblogs',
  data(){
      return{
        //   id:this.$route.params.id,
          blogs:[],
          search:""
          
      }
  },

 mounted(){
    //  window.location.reload();
 },

  created(){
    
      
      this.$http.get("http://localhost:3000/blogs")
      .then(function(data){
          console.log(data);
          
          this.blogs=data.body.slice(0,10);
      })
  },

  computed:{   //这是对象
      filteredBlogs:function(){
          return this.blogs.filter((blog)=>{
              return blog.title.match(this.search);
          })

      }
  },

  
 
  
  
 
}
</script> 

<style scoped>
#show-blogs{
    margin:20px auto;
    max-width: 800px;
}
#blogs{
    background-color: #eee;
    padding:10px;
    margin:20px 0px;
    
}

a{
    text-decoration: none;
}

input[type="text"]{
    width:100%;
    padding:10px;
    box-sizing: border-box;
    
}

</style>
