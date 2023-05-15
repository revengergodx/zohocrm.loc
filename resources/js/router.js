import {createRouter, createWebHistory} from "vue-router";



const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/accounts', component: () => import ('./views/Account/Index.vue'),
            name: 'account.index'
        },
        {
            path: '/accounts/create', component: () => import ('./views/Account/Create.vue'),
            name: 'account.create'
        },
        {
            path: '/deals', component: () => import ('./views/Deals/Index.vue'),
            name: 'deal.index'
        },
        {
            path: '/deals/create', component: () => import ('./views/Deals/Create.vue'),
            name: 'deal.create'
        },
    ],
})

export default router


