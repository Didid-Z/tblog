<template>

<div id="login">
    <h3>登录</h3>
    <p id="Tishi" v-show="showTishi">{{tishi}}</p>
    
        <input type="text" placeholder="请输入用户名" v-model="username">
        <input type="password" placeholder="请输入密码" v-model="password">

    <button @click="login">登录</button>
    <router-link to="/register" exact>已有账号?点击注册</router-link>

</div>
    
</template>

<script>

import {setCookie,getCookie} from "../assets/js/cookie.js"

export default {
    name:"Login",
    props:['islogin'],
    data(){
        return{
            username:'',
            password:'',
            tishi:'',
            showTishi:false,
            currentState:this.islogin,
            current:false
        }
    },

    mounted(){
       
        if(getCookie('username')){
            this.$router.push({path:'/'})
            window.location.reload();
        }
    },

    methods:{
        
        login:function(){
          
            if(this.username == '' && this.password == ''){
                this.showTishi=true,
                this.tishi="请输入用户名和密码"
         
        }else if(this.username !== '' && this.password == ''){
                this.showTishi=true,
                this.tishi="请输入密码"



        }else if(this.username =='' && this.password !==''){
                this.showTishi=true,
                this.tishi="请输入用户名"
            
        }else{
            var data={username:this.username,password:this.password}

            this.$http.post('http://localhost/blogdata/login.php',data).then((res)=>{
                console.log(res);
                if(res.data == 3){   //这里的data是后台返回的数据  要在后台编写
                        this.showTishi=true,
                        this.tishi="请先注册！"

                }else if(res.data == 1){
                    setCookie('username',this.username,1000*60)
                    setTimeout(function(){
                    this.$router.push({ path:'/'})
                        window.location.reload();
                    }.bind(this),1000)
                    // window.location.reload();
                }else{
                    this.showTishi=true,
                        this.tishi="密码错误！"
                }
            })

        }
        }

    }
    
}
</script>

<style scoped>
#login{
    margin:20px auto;
    padding: 20px;
    max-width: 800px;
    border:1px dotted #aaa;
    background:#eee;
}

h3{
    text-align: center;
}
input[type="text"]{
    width:300px;
}
input[type="password"]{
    width:300px;
}
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


