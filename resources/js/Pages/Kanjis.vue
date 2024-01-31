<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";

defineProps({
    kanjis: Array,
});

</script>

<template>
    <Layout>
        <Head title="Kanjis" />
        <div v-for="kanji in kanjis" :key="kanji.id">
            <Link :href="route('kanjis.show', { id: kanji.id })" >
                {{ kanji.character }}
            </Link>
            <div>{{ kanji.meaning }}</div>
        </div>
    </Layout>
</template>

<style>

</style>
