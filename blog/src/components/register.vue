<template>

<div id="register">
    <h3>注册</h3>
    <p id="Tishi" v-show="showTishi">{{tishi}}</p>
    
        <input type="text" placeholder="请输入用户名" v-model="username">
        <input type="password" placeholder="请输入密码" v-model="password">

    

    <button @click="register">注册</button>
    <router-link to="/login" exact>已有账号?点击登录</router-link>

    
</div>
    
</template>

<script>
import {setCookie,getCookie} from "../assets/js/cookie.js"

export default {
    name:"Register",
    data(){
        return{
            username:'',
            password:'',
            tishi:'',
            showTishi:false
        }
    },

    methods:{
        register:function(){

           if(this.username=='' && this.password==''){
                this.showTishi=true,
                this.tishi="请输入用户名和密码"
             
        }else if(this.username!=='' && this.password==''){
            this.showTishi=true,
                this.tishi="请输入密码"

        }else if(this.username=='' && this.password!==''){
            this.showTishi=true,
                this.tishi="请输入用户名"
            
        }else if(this.username !=='' && this.password !== ''){
            let data={'username':this.username,'password':this.password}
            this.$http.post("http://localhost/blogdata/register.php",data).then((res)=>{
                console.log(res);
                 if(res.data == 2){   //这里的data是后台返回的数据  要在后台编写
                        this.showTishi=true,
                        this.tishi="该用户名已存在！"

                }else if(res.data == 1){
                    setCookie('username',this.username,1000*60)
                    setTimeout(function(){
                    this.$router.push({ path:'/'})
                        window.location.reload();
                    }.bind(this),1000)
                    // window.location.reload();
                }else{
                    this.showTishi=true,
                        this.tishi="注册失败！"

                }

            })
            
            



        }

        }

    }
    
}
</script>

<style scoped>
#register{
    margin:20px auto;
    padding: 20px;
    max-width: 800px;
    border:1px dotted #aaa;
    background:#eee;
}

h3{
    text-align: center;
}
input[type="text"],[type="password"]{
    width:300px;
}
/* input[type="password"]{
    width:300px;
} */
input,button{
    display:block;
    margin:20px auto; 
    padding:10px;
}

button{
    padding:20px;
    background-color:brown;
    color:beige;
    border-radius: 4px;
    font-size:20px;
    border:0;
    cursor: pointer;
}

</style>


