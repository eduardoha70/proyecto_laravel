import Vue from 'vue'
import VeeValidate from 'vee-validate'
import VueRouter from 'vue-router'
import VueSweetAlert from 'vue-sweetalert2'

import router from '../components/productos/router'
import es from '../lang/es'

Vue.use(VeeValidate, {
  locale: 'es',
  dictionary: {
    es: {
      messages: es.messages
    }
  }
})
Vue.use(VueRouter)
Vue.use(VueSweetAlert)

import App from '../components/productos/App'

new Vue({
    template: '<App />',
    components: {
      App
    },
    router,
}).$mount('#app')
