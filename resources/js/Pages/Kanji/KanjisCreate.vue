<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import HeaderComponent from "@/Components/HeaderComponent.vue";
import { onMounted } from 'vue';



</script>

<script>
import {defineProps, onMounted} from 'vue';

export default {
    data() {
        return {

        }
    },
    props: {

    },
    methods: {


    },
    computed: {

    },
}
</script>


<template>
    <div>
        <HeaderComponent/>
        <Head title="KanjisCreate" />

    </div>
</template>


<style>
/* Стилизация для локального файла */
.grid > div {
    width: 100%;
}

/* Дополнительные стили для адаптивного отображения контента при наведении */
.absolute {
    overflow: hidden;
}

.absolute:hover {
    overflow: visible;
}
</style>
