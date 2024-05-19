<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
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
                    <div v-if="!showTrainer" class="p-6">
                        <div class="flex flex-wrap justify-center">
                            <div v-for="kanji in kanjisByLevel" :key="kanji.character" class="bg-gray-200 dark:bg-gray-700 m-2 p-4 text-center" style="width: 100px;">
                                {{ kanji.character }}
                            </div>
                        </div>
                        <div class="flex items-center justify-center pt-3 bg-gray-100 dark:bg-gray-900">
                            <div @click="startTrainer" class="px-10 cursor-pointer p-3 bg-blue-300 text-white font-semibold rounded-lg shadow-md hover:bg-blue-400 transition duration-300">
                                Учить
                            </div>
                        </div>
                    </div>

                    <div v-else class="p-6">
                        <div v-if="currentKanji" class="text-center">
                            <div class="text-4xl mb-4">{{ currentKanji.character }}</div>
                            <input v-model="userAnswer" type="text" placeholder="Введите значение" class="border p-2 rounded-lg mb-4 w-full" />
                            <button @click="checkAnswer" class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition duration-300">Проверить</button>
                            <div v-if="feedback" class="mt-4 text-lg">{{ feedback }}</div>
                        </div>
                        <div v-else class="text-center">
                            <p>Все кандзи пройдены!</p>
                            <div @click="resetTrainer" class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition duration-300 cursor-pointer">Назад к кандзи</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
export default {
    props: {
        kanjisByLevel: Array
    },
    data() {
        return {
            showTrainer: false,
            currentIndex: 0,
            userAnswer: '',
            feedback: ''
        };
    },
    computed: {
        currentKanji() {
            return this.kanjisByLevel[this.currentIndex];
        }
    },
    methods: {
        startTrainer() {
            this.showTrainer = true;
            this.resetTrainerState();
        },
        resetTrainer() {
            this.showTrainer = false;
            this.resetTrainerState();
        },
        resetTrainerState() {
            this.currentIndex = 0;
            this.userAnswer = '';
            this.feedback = '';
        },
        checkAnswer() {
            if (this.userAnswer.trim().toLowerCase() === this.currentKanji.meaning.toLowerCase()) {
                this.feedback = 'Верно!';
                this.currentIndex++;
                this.userAnswer = '';
                if (this.currentIndex >= this.kanjisByLevel.length) {
                    this.currentIndex = null;
                }
            } else {
                this.feedback = 'Неверно. Попробуйте еще раз.';
            }
        }
    }
}
</script>
