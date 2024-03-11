<script>
import { defineProps } from 'vue';

export default {
    props: {
        kanjis: Array
    },
    methods: {
        truncate(text, length) {
            if (text.length <= length) {
                return text;
            } else {
                return text.slice(0, length) + '...';
            }
        }
    }
}
</script>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import HeaderComponent from "@/Components/HeaderComponent.vue";
</script>

<template>
    <div>
        <HeaderComponent/>
        <Head title="Kanjis" />
        <div class="container mx-auto p-4">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <div
                    class="relative bg-blue-400 p-6 rounded-lg cursor-pointer overflow-hidden transition duration-300 transform hover:scale-105"
                    v-for="kanji in kanjis"
                    :key="kanji.id"
                >
                    <Link :href="route('kanjis.show', { id: kanji.id })">
                        <div class="font-bold text-6xl text-center">{{ kanji.character }}</div>
                        <div
                            class="absolute inset-0 bg-gray-800 text-white opacity-0 transition duration-300 hover:opacity-100"
                        >
                            <div class="flex flex-col justify-center h-full px-4 py-2">
                                <div class="mb-1 text-center text-lg">{{ kanji.onyomi }}</div>
                                <div class="text-center text-lg">{{ truncate(kanji.meaning, 20) }}</div>
                            </div>
                        </div>
                    </Link>
                </div>
            </div>
        </div>
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
