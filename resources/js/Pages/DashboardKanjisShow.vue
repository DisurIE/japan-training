<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
</script>
<script>
export default {
    props: {
        kanjisByLevel: Array
    },
}
</script>
<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div  class="flex flex-wrap justify-center">
                            <div v-for="kanji in kanjisByLevel" class="bg-gray-200 dark:bg-gray-700 m-2 p-4 text-center" style="width: 100px;">{{ kanji.character }}</div>
                    </div>
                    <div class="flex items-center justify-center pt-3 bg-gray-100 dark:bg-gray-900">
                        <a href="/" class="px-10 p-3 bg-blue-300 text-white font-semibold rounded-lg shadow-md hover:bg-blue-400 transition duration-300">
                            Учить
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
