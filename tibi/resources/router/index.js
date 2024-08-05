import {createRouter, createWebHistory} from "vue-router";

import todoIndex from '../components/todo_items/index.vue';
import NotFound from "../components/NotFound.vue";

const routes = [
    {
        path: '/',
        component: todoIndex,
    },
    {
        path: '/:pathMatch(.*)*',
        component: NotFound,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
