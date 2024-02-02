<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import HeaderComponent from "@/Components/HeaderComponent.vue";

defineProps({

});

</script>

<template>
    <HeaderComponent/>
    <NavLink :href="route('kanjis.index')" :active="route().current('kanjis.index')">Kanjis</NavLink>
    <Head title="Main" />

    <h1>Main</h1>


</template>

<style>

</style>
