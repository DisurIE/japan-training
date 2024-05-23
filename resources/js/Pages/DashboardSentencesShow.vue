<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
</script>
<script>
import {router} from "@inertiajs/vue3";

export default {
    props: {
        name: String,
        exercises: Object,
    },
    methods: {
        checkAnswer(exerciseId, optionText, name){
            router.post('/dashboard/sentences/' + name, {
                'id' : exerciseId,
                'optionText' : optionText
            });
        }
    }
}
</script>
<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>

            <div class="container mx-auto p-4">
                <h1 class="text-2xl font-bold mb-4">Japanese Grammar Exercises</h1>
                <div v-for="exercise in exercises" :key="exercise.id" class="mb-4 p-4 border rounded-lg shadow-md">
                    <p class="mb-2 text-lg">{{ exercise.text }}</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2">
                        <button
                            v-for="option in exercise.options"
                            :key="option.id"
                            @click="checkAnswer(exercise.id, option.text, name)"
                            class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700"
                        >
                            {{ option.text }}
                        </button>
                    </div>
                </div>
            </div>

    </AuthenticatedLayout>
</template>
