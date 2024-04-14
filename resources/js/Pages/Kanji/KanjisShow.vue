<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import HeaderComponent from "@/Components/HeaderComponent.vue";

defineProps({
    kanji: Object,
    radicals: Array,
});

</script>

<template>
    <Layout>
        <Head title="Kanjis" />
        <HeaderComponent/>
        <div class="bg-blue-400 flex-auto p-2.5 max-w-auto p-7">
            <div class="container mx-auto p-4">
                <div class="font-bold text-7xl" >
                    {{ kanji.character }}
                </div>
                <div class="text-2xl">{{ kanji.meaning }}</div>
                <div class="text-2xl">onyomi: {{ kanji.onyomi }}</div>
                <div class="text-2xl">kunyomi: {{ kanji.kunyomi }}</div>
                <div class="text-2xl">Level: {{ kanji.level }}</div>
            </div>
        </div>

            <div v-for="radical in radicals">
                {{ radical.character }}
            </div>

    </Layout>
</template>

<style>

</style>
