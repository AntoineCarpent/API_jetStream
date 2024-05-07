import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import { createRouter, createMemoryHistory } from 'vue-router'

import App from './App.vue'
import HomeView from '@/views/HomeView.vue'
import CreateProducts from "@/components/CreateProducts.vue";
import UpdateProduct from "@/components/UpdateProducts.vue";
import DeleteProduct from "@/components/DeleteProducts.vue";

const router = createRouter({
    history: createMemoryHistory(),
    routes: [
        { path: '/', component: HomeView },
        { path: '/createProducts', component: CreateProducts },
        { path: '/update-product/:id :name :description :price :stock', name: 'updateProduct', component: UpdateProduct  },
        { path: '/delete-product/:id', name: 'deleteProduct', component: DeleteProduct  }
    ]
})

const app = createApp(App)

app.use(createPinia())
app.use(router)

app.mount('#app')
