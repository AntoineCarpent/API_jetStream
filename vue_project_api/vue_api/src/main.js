import './assets/main.css'

import {createApp} from 'vue'
import {createPinia} from 'pinia'
import {createRouter, createWebHistory} from 'vue-router'
import {authGuard} from "@/_helpers/auth-guard.js";
import {useRouter} from "vue-router";
import App from './App.vue'
import HomeView from '@/views/HomeView.vue'
import CreateProducts from "@/components/CreateProducts.vue";
import UpdateProduct from "@/components/UpdateProducts.vue";
import DeleteProduct from "@/components/DeleteProducts.vue";
import ListingView from "@/views/ListingView.vue";
import Login from "@/views/auth/Login.vue";
import Register from "@/views/auth/Register.vue";
import Category from "@/components/Categories.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeView
        },
        {
            path: '/products',
            name: 'products',
            component: ListingView,
            meta: { requiresAuth: true },
        },
        {
            path: '/createProducts',
            name: 'createProduct',
            component: CreateProducts,
            meta: { requiresAuth: true },
        },
        {
            path: '/update-product/:id :name :description :price :stock',
            name: 'updateProduct',
            component: UpdateProduct,
            meta: { requiresAuth: true },
        },
        {
            path: '/delete-product/:id',
            name: 'deleteProduct',
            component: DeleteProduct,
            meta: { requiresAuth: true },
        },
        {
            path: '/category',
            name: 'category',
            component: Category,
            meta: { requiresAuth: true },
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/register',
            name: 'register',
            component: Register,
        },
    ]

});
function isAuthenticated() {
    const token = localStorage.getItem('token');
    return !!token;
}

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !isAuthenticated()) {
        authGuard()
    } else {
        next();
    }
});


const app = createApp(App)

app.use(createPinia())
app.use(router)

app.mount('#app')
export default router;