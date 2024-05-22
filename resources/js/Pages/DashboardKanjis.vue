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
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Уровни</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div  class="flex flex-wrap justify-center">
                            <NavLink v-for="level in levels" :href="'kanjis/' + level"><div class="bg-gray-200 dark:bg-gray-700 m-2 p-4 text-center" style="width: 100px;">{{ level }}</div></NavLink>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
