export default {
    mode: 'history',

    linkActiveClass: 'font-bold',

    routes: [
        {
            path: '/',
            redirect: '/home',
            component: require('./components/Layout').default,
            children: [
                {
                    path: '/home',
                    component: require('./components/Home').default,
                },
                {
                    path: '/about',
                    component: require('./components/About').default
                },
                {
                    path: '/feedback',
                    component: require('./components/Feedback').default
                },
                {
                    path: '/login',
                    component: require('./components/Login').default,
                    beforeEnter: (to, from, next) => {
                        if (localStorage.getItem('authenticated')) {
                            // 已认证跳转到首页
                            next('/');
                        } else {
                            next();
                        }
                    }
                },
                {
                    path: '/new',
                    component: require('./components/NewPost').default,
                    beforeEnter: (to, from, next) => {
                        if (localStorage.getItem('authenticated')) {
                            // 已认证可以访问该路由
                            next();
                        } else {
                            // 否则跳转到登录页面认证
                            next('/login');
                        }
                    }
                },
                {
                    path: '/post/:id',
                    name: 'post',
                    component: require('./components/Post').default
                },
                {
                    path: '/:name',
                    name: 'category',
                    component: require('./components/Category').default
                }
            ]
        }
    ]
}
