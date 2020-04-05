import Vue from 'vue'
import Router from 'vue-router'
import routes from './routes'

Vue.use(Router)

const router = new Router({
    routes: routes,
    mode: process.env.HISTORY_MODE
})

export default router
