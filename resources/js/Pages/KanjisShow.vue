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
        {{kanji.meaning}}

    </Layout>
</template>

<style>

</style>
