<template>
  <div id="add-blog">
     
      <h1>添加博客</h1>   <h2 v-if="submitted">添加成功</h2>
      <form v-if="!submitted">
          <label>博客标题：</label>
          <input type="text" v-model="blog.title">
          <label>博客内容：</label>
          <textarea type="textarea" v-model="blog.content"></textarea>
          

          <div id="categories">
              
              <label>辣</label>
              <input type="checkbox" value="辣" v-model="blog.categories">

              <label>甜</label>
              <input type="checkbox" value="甜" v-model="blog.categories">

              <label>酸</label>
              <input type="checkbox" value="酸" v-model="blog.categories">

          </div>
          
          <label>作者：</label>
          <select v-model="blog.author">
              <option v-for="author in authors">
                  {{author}}

              </option>
              
          </select>


      </form>
      <button v-on:click.prevent="post" v-if="!submitted">添加博客</button>

      <div id="preview">
          <h3>博客总览</h3>

          <p>博客标题：{{blog.title}}</p>
          <p>博客内容:</p>
          <textarea>{{blog.content}}</textarea>
          <p>分类：</p>
          <ul>
              <li v-for="category in blog.categories">
                  {{category}}

              </li>
          </ul>
          <p>作者：{{blog.author}}</p>

    </div>


    
  </div>

 
</template> 

<script>



export default {    
  name: 'add-blog',
  data () {
      return{
          blog:{

          title:"",
          content:"",
          categories:[],
          author:""
      },
      authors:["小周","小王","小吴"],
      submitted:false
    

      }
     
    
  },
  methods:{
     
            post:function(e){
                e.preventDefault();
                
          this.$http.post(
              "http://localhost:3000/blogs",this.blog)
             

          .then(function(data){
              console.log(data);
              this.submitted=true;

          })

          e.preventDefault();

           


      }

      }
  
  

    
  }
 

</script> 

<style scope>

#add-blog *{
    box-sizing:border-box;
    


}
#add-blog{
    margin:20px auto;
    
    max-width: 600px;
    padding:20px;

}

label{
    display:block;
    margin:20px 0 10px;
}
input[type="text"],textarea,select{
    width:100%;
    padding:10px;
    display:block;
}
#categories label{
    display:inline-block;
    margin-top:0px;
    
}
#categories input{
    display:inline-block;

    margin-right:20px;

}
 textarea{
    
     height:200px;


 }

button{
    padding:20px;
    background-color:brown;
    color:beige;
    font-size:20px;
    border:0;
    cursor:pointer;
    border-radius: 4px;
    margin:20px 0;
}

#preview{
    border:1px dotted #ccc;
    padding:10px 20px;
    margin:30px 0;
}
h3{
    margin-top:10px;
}


</style>
