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
                <div class="bg-fuchsia-800 flex-auto p-2.5 max-w-20" v-for="kanji in kanjis" :key="kanji.id">
                    <Link class="font-bold" :href="route('kanjis.show', { id: kanji.id })" >
                        {{ kanji.character }}
                    </Link>
                    <div>{{ kanji.meaning }}</div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<style>

</style>
