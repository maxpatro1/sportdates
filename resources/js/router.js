import Vue from 'vue'
import Router from 'vue-router'
import app from "./components/app";


Vue.use(Router);

let router = new Router({
    routes: [
        {
            path: '/',
            name: 'mainPage',
            component: app
        },
    ]
})

export default router;
