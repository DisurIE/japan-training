<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import HeaderComponent from "@/Components/HeaderComponent.vue";
import HomePage from "@/Components/HomePage.vue";

defineProps({

});

</script>

<template>
    <Head title="Main" />
    <HeaderComponent/>

    <HomePage/>


</template>

<style>

</style>
