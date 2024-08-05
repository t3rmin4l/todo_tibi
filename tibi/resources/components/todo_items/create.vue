<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';

const name = ref('');
const description = ref('');
const completed = ref(false);
const router = useRouter();
const errorMessage = ref('');

const submitForm = async () => {
    try {
        await axios.post('/todo_items', {
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
</script>

<template>
    <div v-if="errorMessage" style="color: red">{{ errorMessage }}</div>

    <h1>Create todo item</h1>
    <input v-model="name" type="text" placeholder="name" /> <br />
    <textarea v-model="description" placeholder="description" style="margin-top: 1em"></textarea> <br />

    <label>
        <input v-model="completed" type="checkbox" />
        Completed
    </label> <br /><br />

    <button @click="submitForm">Submit</button>

    <br /><br />
    <router-link to="/">Back to homepage</router-link>
</template>
