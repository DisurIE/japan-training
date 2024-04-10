<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import HeaderComponent from "@/Components/HeaderComponent.vue";


</script>
<script>
export default {
    props: {
        radicals: Array
    },
}

</script>
<template>
    <HeaderComponent/>
    <div v-for="radical in radicals">
        {{ radical.character }}
    </div>
</template>

<style>

</style>
