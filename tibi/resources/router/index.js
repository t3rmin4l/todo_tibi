import {createRouter, createWebHistory} from "vue-router";

import todoIndex from '../components/todo_items/index.vue';
import todoCreate from '../components/todo_items/create.vue';
import todoEdit from '../components/todo_items/edit.vue';
import NotFound from "../components/NotFound.vue";

const routes = [
    {
        path: '/',
        component: todoIndex,
    },
    {
        path: '/create_todo_item',
        name: 'createTodoItem',
        component: todoCreate,
    },
    {
        path: '/edit/:id',
        name: 'editTodoItem',
        component: todoEdit
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
