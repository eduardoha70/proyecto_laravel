import Vue from 'vue'
import Router from 'vue-router'

import BandejaProductos from './components/BandejaProductos'

export default new Router({
  routes: [
    {
      path: '/',
      component: BandejaProductos,
      name: 'bandeja-productos'
    },
  ]
})
