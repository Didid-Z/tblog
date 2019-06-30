<template>
<div>

<div id="showablog">

   
    <h2>{{blog.title}}</h2>
    <article>{{blog.content}}</article>
    <article>分类：
        <ul><li v-for="blog in blog.categories">{{blog}}</li></ul>
        
        </article>
    <article>作者：{{blog.author}}</article>
     <button @click="DeleteThisBlog" id="delete">删除</button>
     <router-link :to="'/edit/'+id">编辑</router-link>


</div>

<div id="words">
         <p>留言板：</p>
         <div v-for="word in filteredWords" id="showWords">
         <h2>{{word.id}}</h2>
         <article>{{word.message}}</article>
         
         </div>
         <textarea v-model="word.message" placeholder="写下你的留言吧"></textarea>
         </br>
         <button @click="SendWord" id="send">发送</button>


     </div>
     </div>
    
</template>

<script>
export default {
    name:"showablog",
    data(){
        return{
            id:this.$route.params.id,
            
            blog:{},
            words:[],
            word:{
                id:"",
                message:"",
                blogid:this.$route.params.id
               

            }

        }
    },

    created(){
        this.$http.get("http://localhost:3000/blogs/"+this.id)
        .then(function(data){
            // console.log(data);
            this.blog=data.body;
        }),

        this.$http.get("http://localhost:3000/words/")
        .then(function(data){
            this.words=data.body.slice(0,100);
            // this.words.id=this.id;
            console.log(this.words);
            // this.words=data.body;
        })


    },

     methods:{
         
        
        

         
         
      DeleteThisBlog(){
          this.$http.delete("http://localhost:3000/blogs/"+this.id)
          .then((response)=>{
              this.$router.push({ path:'/' })
          })

      },

      SendWord:function(e){
       
        this.$router.go();
          e.preventDefault();
          this.$http.post("http://localhost:3000/words",this.word)
          .then(function(data){
            //   console.log(data);
          })
      
      e.preventDefault();
      
     }
         
  },
  computed:{   //这是对象
      filteredWords:function(){
         var iid=this.id;
          return this.words.filter(function(msg){
            //   console.log(msg.blogid);
              return msg.blogid.match(iid);
          })

      }
  }
  
    
}
</script>


<style scoped>

#showablog{
    margin:20px auto;
    padding: 20px;
    max-width: 800px;
    border:1px dotted #aaa;
    background:#eee;
}

#delete{
    margin:20px 10px;
    padding:20px;
    background-color:brown;
    color:beige;
    border-radius: 10px;
    font-size:18px;
    border:0;
    cursor: pointer;


}

article{
    margin:20px 10px;
}
p{
    font-size:30px;
}

textarea{
    align-content: center;
    width:100%;
    height:200px;
    border-bottom-color:slategray;
}

#showWords{
    margin:20px auto;
    padding:10px;
    background-color:tan;
    

}

#words{
    margin:20px auto;
    padding: 20px;
    max-width: 800px;
    border:1px dotted #aaa;
    /* background:#ccc; */

}

#send{
    margin:20px 10px 20px 700px;
    padding:20px;
    background-color:brown;
    color:beige;
    border-radius: 10px;
    font-size:18px;
    border:0;
    cursor: pointer;

}

 

</style>


