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
            levelArray: [],
            counter : 0,
        }
    },
    props: {
        kanjis: Array
    },
    methods: {
        execute(text, separator){
            return text.split(separator)[0].replace(/[\s.,%]/g, '');
        }
    },
    computed: {
        getLevels: function () {
            this.kanjis.forEach(kanji => {
                this.levelArray.push(kanji.level);
            })
            return [...new Set(this.levelArray)].sort((a,b) => a - b);
        },
        kanjiGroup: function() {
            const grouped = {};
            this.kanjis.forEach(kanji => {
                if (!grouped[kanji.level]) {
                    grouped[kanji.level] = [];
                }
                grouped[kanji.level].push(kanji);
            });
            return grouped;
        },
    },
}
</script>


<template>
        <div class="container mx-auto p-4">
            <!-- Вывод кандзи для каждого уровня -->
            <div v-for="(level, index) in getLevels" :key="index">
                <h2 class="bold text-3xl m-3 dark:text-white">{{ level }} Уровень</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    <!-- Отображение кандзи для текущего уровня -->
                    <div v-for="kanji in kanjiGroup[level]" :key="kanji.id">
                        <div class="relative bg-blue-400 p-6 rounded-lg cursor-pointer overflow-hidden transition duration-300 transform hover:scale-105">
                            <Link :href="route('kanjis.show', { id: kanji.character })">
                                <div class="font-bold text-6xl text-center">{{ kanji.character }}</div>
                                <div class="absolute inset-0 bg-gray-800 text-white opacity-0 transition duration-300 hover:opacity-100">
                                    <div class="flex flex-col justify-center h-full px-4 py-2">
                                        <div class="mb-1 text-center text-lg">{{ execute(kanji.onyomi, ' ') }}</div>
                                        <div class="text-center text-lg">{{ execute(kanji.meaning, ' ') }}</div>
                                        <div class="text-center text-lg">{{ kanji.level }}</div>
                                    </div>
                                </div>
                            </Link>
                        </div>
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
