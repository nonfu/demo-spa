export default {
    mode: 'history',

    linkActiveClass: 'font-bold',

    routes: [
        {
            path: '/',
            component: require('./components/Home').default
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
            component: require('./components/Login').default
        },
        {
            path: '/new',
            component: require('./components/NewPost').default
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
