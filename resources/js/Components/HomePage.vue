<template>
    <div class="container mx-auto py-8">
        <h1 class="text-4xl font-bold mb-4">Добро пожаловать на сайт по изучению японского языка!</h1>
        <p class="text-lg mb-8">Начните свой путь к изучению японского языка прямо сейчас.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <NavLink  :href="route('hiragana-katakana.index')" :active="route().current('hiragana-katakana.index')" class="flex pt-4 items-center justify-center bg-blue-500 text-white py-4 px-6 rounded-lg text-lg font-semibold hover:bg-blue-600 transition duration-300">
                Тренажер кан (Хирагана/Катакана)
            </NavLink>
            <NavLink  :href="route('radicals.index')" :active="route().current('radicals.index')" class="flex pt-4 items-center justify-center bg-green-500 text-white py-4 px-6 rounded-lg text-lg font-semibold hover:bg-green-600 transition duration-300">
                Ключи
            </NavLink>
            <NavLink  :href="route('kanjis.index')" :active="route().current('kanjis.index')" class="flex pt-4 items-center justify-center bg-yellow-500 text-white py-4 px-6 rounded-lg text-lg font-semibold hover:bg-yellow-600 transition duration-300">
                Кандзи
            </NavLink>
        </div>
    </div>
</template>

<script>
import {router} from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";

export default {
    name: 'HomePage',
    components: {NavLink},
    methods: {
        router() {
            return router
        }
    }
}
</script>
