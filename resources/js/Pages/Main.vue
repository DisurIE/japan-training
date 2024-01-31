<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";

defineProps({

});

</script>

<template>
    <NavLink :href="route('kanjis.index')" :active="route().current('kanjis.index')">Kanjis</NavLink>
    <Head title="Main" />

    <h1>Main</h1>


</template>

<style>

</style>
