<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import HeaderComponent from "@/Components/HeaderComponent.vue";


</script>
<script>
export default {
    props: {
        radical: Object
    },
}

</script>
<template>
    <HeaderComponent/>
    <div>
        {{ radical.character }}
    </div>
</template>

<style>

</style>
