<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-800">
        <slot />
    </div>
</template>
