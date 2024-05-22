<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
</script>

<template>
    <Head title="Личный кабинет" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-5 my-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <NavLink :href="route('dashboard.exercise.index')" :active="route().current('dashboard.exercise.index')">Учить предложения</NavLink>
                </div>
                <div class="p-5 my-2 bottom-0.5 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <NavLink :href="route('dashboard.kanjis.index')" :active="route().current('dashboard.kanjis.index')">Учить кандзи</NavLink>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
