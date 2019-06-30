<template>
    <nav>

        <ul id="blogcenter">
            <li>
                <router-link to="/" exact>博客</router-link>
                <router-link to="/add" exact>写博客</router-link>
            </li>
        </ul>
        <div id="registerLogin" v-if='ok'>
                <router-link to="/login" exact>登录</router-link>
                <router-link to="/register" exact>注册</router-link>
        </div>
        <div id="registerLogin" v-else>
            <span>{{name}}</span> 
            <span @click="quit" type='button'>退出登录</span>
        </div>

         

    </nav>

</template>

<script>
import {setCookie,getCookie,delCookie} from "../assets/js/cookie.js"
import showblogs from './showblogs'
import login from './login'

export default {
    name:'blogheader',
    // props:['User'],

    data(){
        return{
            ok:true,
            name:''
           
        }
    },

    mounted(){
        
        let uname=getCookie('username')
        this.name=uname

        if(!uname==''){
            
            this.ok=false
        }else{
            this.router.push('./login')
        }

    },

    

    methods:{
        quit(){
            delCookie('username');
            this.ok=true

        }

      
        
        
        
    }
}
</script>

<style scoped>
ul,div{
    list-style-type: none;
    display:inline-block;
    margin-left:700px;
   
}
#blogcenter li{
    /* margin-left:100px; */
    margin:0px 20px;
    
}

#blogcenter a{
    color:#fff;
    padding:12px;
    border-radius: 5px;
    text-decoration:none;
    font-size:20px;
    

}

#registerLogin{
    margin-left:600px;
   
}

#registerLogin a{
    text-decoration:none;
    color:#fff;
    font-size:16px;
    

}

nav{
    background-color:brown;
    padding:20px 0;
}



.router-link-active{
    background:rgba(255,255,255,0.8);
    color:#444;
    
}

span[type='button']{
    cursor: pointer;

}

</style>

