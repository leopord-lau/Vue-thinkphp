// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
import ECharts from 'echarts'
import store from './store/index'
import VueResource from 'vue-resource'
Vue.config.productionTip = false
Vue.use(ElementUI)
Vue.use(VueResource)
Vue.prototype.$echarts=ECharts
/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  components: { App },
  template: '<App/>'
})

router.beforeEach(({meta,path},from,next)=>{
  var {auth = true}=meta
  var isLogin=Boolean(store.state.user.username)
  if(auth&&!isLogin&&path!=='/login'){
    return next({path:'/login'})
  }
  next()
})

