<script setup>
import { Head, Link } from '@inertiajs/vue3';
import RadicalsList from '@/Components/TadicalsList.vue'
import HeaderComponent from "@/Components/HeaderComponent.vue";


</script>
<script>
export default {
    props: {
        radicals: Array
    },
    methods: {
        truncate(text, length) {
            if (text.length <= length) {
                return text;
            } else {
                return text.slice(0, length);
            }
        },
        execute(text, separator){
            return text.split(separator)[0].replace(/[\s.,%]/g, '');
        }
    },
}

</script>
<template>
    <HeaderComponent/>
    <Head title="Radicals" />
    <RadicalsList :radicals="radicals"></RadicalsList>


</template>

<style scoped>

</style>
