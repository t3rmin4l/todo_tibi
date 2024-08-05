<script setup>
    import {onMounted, ref} from "vue";

    let todoItems = ref([]);

    onMounted(async () => {
        let response = await axios.get("/todo_items");
        todoItems.value = response.data.todoItems;
    });
</script>

<template>
    <router-link :to="{name: 'createTodoItem'}">add todo item</router-link>

    <br /><br />

    <div
        v-for="todoItem in todoItems"
        :key="todoItem.id"
        :class="{ 'todo-item-completed': todoItem.completed }"
        class="pb-2 mb-2"
        style="border-bottom: 2px solid black;"
    >
        <router-link :to="{name: 'editTodoItem', params: { id: todoItem.id }}">
            {{ todoItem.name }} <br />
            <i>{{ todoItem.description }}</i>
        </router-link>
    </div>

    <div v-if="todoItems.length === 0">no todo items yet</div>
</template>
