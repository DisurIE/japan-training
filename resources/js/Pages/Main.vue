<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import HeaderComponent from "@/Components/HeaderComponent.vue";
import HomePage from "@/Components/HomePage.vue";

defineProps({

});

</script>

<template>
    <Head title="Main" />
    <HeaderComponent/>

    <div class="container mx-auto p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
            <!-- Карточка 1: Кандзи -->
            <div class="bg-white rounded-lg shadow-md p-4 flex flex-col justify-between">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500 mb-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 0 1 .707.293l5 5a1 1 0 0 1-1.414 1.414l-1.758-1.757-.536 2.143a1 1 0 1 1-1.938-.398l.637-2.55-1.757-1.758a1 1 0 0 1 1.414-1.414l1.293 1.293.878-.879-4-4A1 1 0 0 1 10 3zm0 11a1 1 0 0 1-.707-.293l-5-5a1 1 0 0 1 1.414-1.414L10 11.586l4.293-4.293a1 1 0 1 1 1.414 1.414l-5 5A1 1 0 0 1 10 14z"/>
                    </svg>
                    <h2 class="text-lg font-semibold mb-2">Кандзи</h2>
                    <p class="text-gray-600">Изучение японских иероглифов.</p>
                </div>
                <Link :href="route('kanjis.index')" :active="route().current('kanjis.index')" class="text-blue-500">Перейти</Link>
            </div>
            <!-- Карточка 2: Ключи (радикалы) -->
            <div class="bg-white rounded-lg shadow-md p-4 flex flex-col justify-between">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500 mb-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 0 1 .707.293l5 5a1 1 0 0 1-1.414 1.414l-1.758-1.757-.536 2.143a1 1 0 1 1-1.938-.398l.637-2.55-1.757-1.758a1 1 0 0 1 1.414-1.414l1.293 1.293.878-.879-4-4A1 1 0 0 1 10 3zm0 11a1 1 0 0 1-.707-.293l-5-5a1 1 0 0 1 1.414-1.414L10 11.586l4.293-4.293a1 1 0 1 1 1.414 1.414l-5 5A1 1 0 0 1 10 14z"/>
                    </svg>
                    <h2 class="text-lg font-semibold mb-2">Ключи (радикалы)</h2>
                    <p class="text-gray-600">Понимание основных компонентов кандзи.</p>
                </div>
                <Link :href="route('radicals.index')" :active="route().current('radicals.index')" class="text-blue-500">Перейти</Link>
            </div>
            <!-- Карточка 3: Хирагана-катакана интерактивный тренажер -->
            <div class="bg-white rounded-lg shadow-md p-4 flex flex-col justify-between">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500 mb-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 0 1 .707.293l5 5a1 1 0 0 1-1.414 1.414l-1.758-1.757-.536 2.143a1 1 0 1 1-1.938-.398l.637-2.55-1.757-1.758a1 1 0 0 1 1.414-1.414l1.293 1.293.878-.879-4-4A1 1 0 0 1 10 3zm0 11a1 1 0 0 1-.707-.293l-5-5a1 1 0 0 1 1.414-1.414L10 11.586l4.293-4.293a1 1 0 1 1 1.414 1.414l-5 5A1 1 0 0 1 10 14z"/>
                    </svg>
                    <h2 class="text-lg font-semibold mb-2">Хирагана-катакана интерактивный тренажер</h2>
                    <p class="text-gray-600">Тренировка навыков чтения и письма хираганы и катаканы.</p>
                </div>
                <Link :href="route('hiragana-katakana.index')" :active="route().current('hiragana-katakana.index')" class="text-blue-500">Перейти</Link>
            </div>
            <!-- Карточка 4: Профиль -->
            <div class="bg-white rounded-lg shadow-md p-4 flex flex-col justify-between">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500 mb-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 0 1 .707.293l5 5a1 1 0 0 1-1.414 1.414l-1.758-1.757-.536 2.143a1 1 0 1 1-1.938-.398l.637-2.55-1.757-1.758a1 1 0 0 1 1.414-1.414l1.293 1.293.878-.879-4-4A1 1 0 0 1 10 3zm0 11a1 1 0 0 1-.707-.293l-5-5a1 1 0 0 1 1.414-1.414L10 11.586l4.293-4.293a1 1 0 1 1 1.414 1.414l-5 5A1 1 0 0 1 10 14z"/>
                    </svg>
                    <h2 class="text-lg font-semibold mb-2">Профиль</h2>
                    <p class="text-gray-600">Личный профиль для отслеживания прогресса.</p>
                </div>
                <Link :href="route('login')" :active="route().current('login')" class="text-blue-500">Перейти</Link>
            </div>
        </div>
    </div>


</template>

<style>

</style>
