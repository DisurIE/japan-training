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
        <div class="bg-fuchsia-800 flex-auto p-2.5 max-w-20">
            <div class="font-bold" >
                {{ kanji.character }}
            </div>
            <div>{{ kanji.meaning }}</div>
            <div>{{ kanji.onyomi }}</div>
            <div>{{ kanji.kunyomi }}</div>
            <div>{{ kanji.level }}</div>
        </div>

    </Layout>
</template>

<style>

</style>
