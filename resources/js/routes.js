export default {
    mode: 'history',

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
