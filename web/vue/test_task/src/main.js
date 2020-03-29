import Vue from 'vue'
import App from './App.vue'

import VueRouter from 'vue-router'

import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueRouter)

Vue.prototype.$axios = axios

import routes from './router/routeess'

const router = new VueRouter({routes});

new Vue({

  el: '#app',
   router,
  render: h => h(App)
})
