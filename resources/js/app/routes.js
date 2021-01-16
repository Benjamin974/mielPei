import Vue from 'vue';
import VueRouter from 'vue-router';
import Accueil from './views/Accueil.vue';
import Producteurs from './views/Producteurs.vue';
import Producteur from './views/Producteur.vue';
import Products from './views/Products.vue';
import Basket from './views/Basket.vue';
import Confirm from './views/Stepper.vue';
import Dashboard from './views/Dashboard.vue';
import Login from './login/Login.vue';
import { authenticationService } from "./_services/authentication.service";
import { Role } from './_helpers/role.js';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'accueil',
            component: Accueil,
            meta: { authorize: [Role.Producteur, Role.Client, Role.Admin] }

        },
        {
            path: '/producteurs',
            name: 'producteurs',
            component: Producteurs,
            meta: { authorize: [Role.Producteur, Role.Client, Role.Admin] }

        },
        {
            path: '/producteur/:id',
            name: 'producteur',
            component: Producteur,
            meta: { authorize: [Role.Producteur] }
        },
        {
            path: '/products',
            name: 'products',
            component: Products,
            meta: { authorize: [Role.Producteur, Role.Client, Role.Admin] }

        },
        {
            path: '/basket',
            name: 'basket',
            component: Basket,
            meta: { authorize: [Role.Producteur, Role.Client, Role.Admin] }

        },
        {
            path: '/confirm',
            name: 'confirm',
            component: Confirm,
            meta: { authorize: [Role.Producteur, Role.Client, Role.Admin] }
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
            meta: { authorize: [Role.Admin] }
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
        },

    ]
})

router.beforeEach((to, from, next) => {

    // redirect to login page if not logged in and trying to access a restricted page
    const { authorize } = to.meta;

    if (authorize && !_.isEmpty(authorize)) {

        const currentUser = authenticationService.currentUserValue;

        if (!currentUser) {
            // not logged in so redirect to login page with the return url
            return next({ path: "/login", query: { returnUrl: to.path } });
        }
        // check if route is restricted by role
        if (authorize.length && !authorize.includes(currentUser.role.name)) {
            // role not authorised so redirect to home page
            return next({ path: "/" });
        }

    }

    return next();
});

export default router;