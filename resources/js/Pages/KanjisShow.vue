<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";

defineProps({
    kanji: Object,
});

</script>

<template>
    <Layout>
        <Head title="Kanjis" />
        <div class="bg-blue-400 flex-auto p-2.5 max-w-auto p-7">
            <div class="font-bold text-7xl" >
                {{ kanji.character }}
            </div>
            <div class="text-2xl">{{ kanji.meaning }}</div>
            <div class="text-2xl">onyomi: {{ kanji.onyomi }}</div>
            <div class="text-2xl">kunyomi: {{ kanji.kunyomi }}</div>
            <div class="text-2xl">Level: {{ kanji.level }}</div>
        </div>

    </Layout>
</template>

<style>

</style>
