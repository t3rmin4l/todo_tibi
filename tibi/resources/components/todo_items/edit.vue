<script setup>
import { ref, onMounted } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import axios from 'axios';

const name = ref('');
const description = ref('');
const completed = ref(false);
const router = useRouter();
const route = useRoute();
const errorMessage = ref('');
const id = route.params.id;

onMounted(async () => {
    try {
        const response = await axios.get(`/todo_items/${id}/edit`);
        const todoItem = response.data;
        name.value = todoItem.name;
        description.value = todoItem.description;
        completed.value = todoItem.completed === 1;
    } catch (error) {
        alert('err');
        router.push('/');
    }
});

const submitForm = async () => {
    try {
        await axios.put(`/todo_items/${id}`, {
            name: name.value,
            description: description.value,
            completed: completed.value
        });
        router.push('/');
    } catch (error) {
        const errors = error.response.data.errors;
        errorMessage.value = Object.values(errors).flat().join(' ');
    }
};

const deleteTodoItem = async () => {
    if (confirm('sure?')) {
        await axios.delete(`/todo_items/${id}`);
        router.push('/');
    }
};

</script>

<template>
    <div v-if="errorMessage" style="color: red">{{ errorMessage }}</div>

    <h1>Edit todo item</h1>
    <input v-model="name" type="text" placeholder="name" /> <br />
    <textarea v-model="description" placeholder="description" style="margin-top: 1em"></textarea> <br />

    <label>
        <input v-model="completed" type="checkbox" />
        Completed
    </label> <br /><br />

    <button @click="submitForm">Update</button>

    <button @click="deleteTodoItem" style="margin-left: 10px; background-color: red;">Delete</button>

    <br /><br />
    <router-link to="/">Back to homepage</router-link>
</template>
