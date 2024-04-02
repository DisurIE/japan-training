<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import HeaderComponent from "@/Components/HeaderComponent.vue";
import { onMounted } from 'vue';



</script>

<script>
import {defineProps, onMounted} from 'vue';

export default {
    data() {
        return {

        }
    },
    props: {

    },
    methods: {


    },
    computed: {

    },
}
</script>


<template>
    <div>
        <HeaderComponent/>
        <Head title="KanjisCreate" />


        <form method="POST" action="/kanjis" class="max-w-sm mx-auto">
            @csrf
            <div class="mb-5">
                <label for="character" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Character</label>
                <input type="text" id="character" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required />
            </div>
            <div class="mb-5">
                <label for="meaning" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meaning</label>
                <input type="text" id="meaning" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="mb-5">
                <label for="onyomi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Onyomi</label>
                <input type="text" id="onyomi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="mb-5">
                <label for="kunyomi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kunyomi</label>
                <input type="text" id="kunyomi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="mb-5">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an Important reading</label>
                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option selected>Choose an important reading</option>
                    <option value="kunyomi">kunyomi</option>
                    <option value="onyomi">onyomi</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Level</label>
                <input type="number" id="level" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>

    </div>
</template>


<style>
/* Стилизация для локального файла */
.grid > div {
    width: 100%;
}

/* Дополнительные стили для адаптивного отображения контента при наведении */
.absolute {
    overflow: hidden;
}

.absolute:hover {
    overflow: visible;
}
</style>
