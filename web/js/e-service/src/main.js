import Vue from 'vue'
import App from './App.vue'

import AppInput from './App-input.vue'
 Vue.component('appInput', AppInput)


new Vue({
  el: '#app',

  render: h => h(App)
})
