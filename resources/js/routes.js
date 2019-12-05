import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router);

let routes = new Router({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/eshop',
            redirect: '/eshop/dashboard',
            component: require('./component/Layout').default,
            children: [
                {
                    path: '/eshop/dashboard',
                    name: 'dashboard',
                    component: require('./component/views/Dashboard').default,
                    meta: {
                        title: 'Dashboard'
                    }
                },
            ]
        },
        {
            path: '/eshop/login',
            name: 'login',
            component: require('./component/Login').default,
            meta: {
                title: 'Welcome back!'
            }
        },
    ]
});

/** seo
 * Handling title tag Access Cases */
routes.beforeEach((to, from, next) => {
    document.title = to.meta.title + ' ' + document.title;
    next();
});

export default routes;
