<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import HeaderComponent from "@/Components/HeaderComponent.vue";
import { onMounted } from 'vue';
import KanjisList from "@/Components/KanjisList.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";


</script>

<script>
import {defineProps, onMounted} from 'vue';

export default {
    data() {
        return {
            levelArray: [],
            counter : 0,
        }
    },
    props: {
        kanjis: Array
    },
    methods: {
        execute(text, separator){
            return text.split(separator)[0].replace(/[\s.,%]/g, '');
        }
    },
    computed: {
        getLevels: function () {
            this.kanjis.forEach(kanji => {
                this.levelArray.push(kanji.level);
            })
            return [...new Set(this.levelArray)].sort((a,b) => a - b);
        },
        kanjiGroup: function() {
            const grouped = {};
            this.kanjis.forEach(kanji => {
                if (!grouped[kanji.level]) {
                    grouped[kanji.level] = [];
                }
                grouped[kanji.level].push(kanji);
            });
            return grouped;
        },
    },
}
</script>


<template>
    <div>
        <HeaderComponent/>
        <Head title="Kanjis" />
        <GuestLayout>
            <KanjisList :kanjis="kanjis"></KanjisList>
        </GuestLayout>
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
