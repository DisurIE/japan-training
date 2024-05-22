<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
</script>

<script>
export default {
    props: {
        levels: Array
    },
}
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Уровни:</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div v-for="level in levels" class="p-5 my-2 bottom-0.5 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <NavLink :href="'/dashboard/sentences/' + level" >{{level}}</NavLink>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
