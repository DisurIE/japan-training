<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import KanjisList from "@/Components/KanjisList.vue";
import HeaderComponent from "@/Components/HeaderComponent.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";


</script>
<script>
export default {
    props: {
        radical: Object,
        kanjis: Array,
    },
}

</script>
<template>
    <HeaderComponent/>

    <div class="bg-green-400 flex-auto p-2.5 max-w-auto p-7">
        <div class="container mx-auto p-4">
            <div class="font-bold text-7xl" >
                {{ radical.character }}
            </div>
            <div class="text-2xl">{{ radical.meaning }}</div>
            <div class="text-2xl">Reading: {{ radical.reading }}</div>
            <div class="text-2xl">Meaning: {{ radical.meaning }}</div>
            <div class="text-2xl">Strokes: {{ radical.strokes }}</div>
        </div>
    </div>
        <div class="container mx-auto p-4">Кандзи в которых используется этот ключ</div>
        <KanjisList :kanjis="kanjis"></KanjisList>

</template>

<style>

</style>
