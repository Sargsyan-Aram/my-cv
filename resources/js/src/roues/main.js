const Home = () => import('../pages/main/Home');
const Register = () => import('../pages/main/Register');
const Login = () => import('../pages/main/Login');
import MainApp from '../layouts/MainApp';

export default [
    {
        path: '/',
        name: 'home',
        component: MainApp,
        children: [
            {
                path: '/',
                name: 'home',
                component: Home,
                meta: {
                    auth: false
                }
            },
            {
                path: '/register',
                name: 'register',
                component: Register,
                meta: {
                    auth: false
                }
            },
            {
                path: '/login',
                name: 'login',
                component: Login,
                meta: {
                    auth: false
                }
            },
        ]
    },
];
