<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import HeaderComponent from "@/Components/HeaderComponent.vue";

defineProps({
    radicals: Array,
});

</script>

<template>
    <HeaderComponent/>
    Радикалы
</template>

<style>

</style>
