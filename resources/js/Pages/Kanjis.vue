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
        <div class="container mx-auto pr-4 pl-4">
            <div class="flex flex-wrap gap-0.5">
                <div class="bg-blue-400 flex-auto p-2.5 max-w-40" v-for="kanji in kanjis" :key="kanji.id">
                    <Link class="font-bold text-4xl" :href="route('kanjis.show', { id: kanji.id })" >
                        {{ kanji.character }}
                    </Link>
                    <div>{{ kanji.onyomi }}</div>
                    <div>{{ kanji.meaning }}</div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<style>

</style>
