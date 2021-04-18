import VueRouter from 'vue-router'
import main from './main';

// Routes
const routes = [...main];

const router = new VueRouter({
    history: true,
    mode: 'history',
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.auth)) {
        if (false) { //TODO implement auth is log in ed logic
            next({
                path: '/login',
                query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else {
        next();
    }
});

export default router;
