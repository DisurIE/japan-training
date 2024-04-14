<script setup>
import { Head, Link } from '@inertiajs/vue3';
import RadicalsList from '@/Components/RadicalsList.vue'
import HeaderComponent from "@/Components/HeaderComponent.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";


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
    <GuestLayout>
        <RadicalsList :radicals="radicals"></RadicalsList>
    </GuestLayout>

</template>

<style scoped>

</style>
