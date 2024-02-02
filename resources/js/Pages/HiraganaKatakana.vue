<script setup>

import HeaderComponent from "@/Components/HeaderComponent.vue";
import HiraganaKatakanaComponent from "@/Components/HiraganaKatakanaComponent.vue";
</script>

<template>
    <HeaderComponent/>
    <hiragana-katakana-component/>
</template>

<style scoped>
.grid > div:nth-child(5n+2),
.grid > div:nth-child(5n+3),
.grid > div:nth-child(5n+4),
.grid > div:nth-child(5n+5),
.grid > div:nth-child(5n+6) {
    background-color: #e2e8f0;
}

.grid > div:nth-child(6),
.grid > div:nth-child(11),
.grid > div:nth-child(16),
.grid > div:nth-child(21),
.grid > div:nth-child(26) {
    background-color: #fbd38d;
}
</style>
