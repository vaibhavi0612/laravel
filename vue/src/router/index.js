import { createRouter,createWebHistory } from "vue-router";
import Dashboard from "../views/Dashboard.vue";
import Properties from "../views/Properties.vue";
import PropertyView from "../views/PropertyView.vue";
import DefaultLayout from "../components/DefaultLayout.vue";

const routes = [
    {
        path:'/',
        redirect:'/',
        component: DefaultLayout,
        children: [
            { path: '/', name:'Dashboard', component: Dashboard},
            { path: '/properties', name:'Properties', component: Properties},
            { path: '/properties/create', name:'PropertyView', component: PropertyView}
        ]
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router