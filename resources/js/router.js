import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)


import routes from './routes'


const router = new VueRouter({
    mode: 'history', // serve a pulire l'URI e toglie l'# che sennò andrebbe a fine URI
    routes // short for `routes: routes`
})

export default router;