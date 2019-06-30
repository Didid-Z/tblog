import Vue from 'vue/dist/vue.js'

import Routes from './routes.js'


import APP from './APP'
// import Vuex from 'vuex'

Vue.config.productionTip = false

import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
// import {user} from '@/store.js'

Vue.use(VueResource)
Vue.use(VueRouter)
// Vue.use(Vuex)



//定义路由
const router=new VueRouter({
  routes: Routes,
 
  mode:"history"
            
})


new Vue({
  // router,
  el: '#app',
  template:'<APP/>',
  components:{APP},
  router:router
})
