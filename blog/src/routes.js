import addblogs from './components/addblog.vue'
import showblogs from './components/showblogs.vue'
import showAblog from './components/showAblog.vue'
import editblog from './components/editblog.vue'
import register from './components/register.vue'
import login from './components/login.vue'
import blogheader from './components/blogheader.vue'




export default[
    {path:"/",component:showblogs},
    {path:"/header",component:blogheader},
    
    {path:"/add",component:addblogs},
    {path:"/blog/:id",component:showAblog},
    {path:"/edit/:id",component:editblog},
    {path:"/register",component:register},
    {path:"/login",component:login}
   
     
]
