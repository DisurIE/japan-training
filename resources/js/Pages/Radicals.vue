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
    <div class="container mx-auto p-4">

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <!-- Отображение ключей -->
                <div v-for="radical in radicals" :key="radical.id">
                    <div class="relative bg-green-400 p-6 rounded-lg cursor-pointer overflow-hidden transition duration-300 transform hover:scale-105">
                        <Link :href="route('radicals.show', { id: radical.character })">
                            <div class="font-bold text-6xl text-center">{{ truncate(radical.character, 1) }}</div>
                            <div class="absolute inset-0 bg-gray-800 text-white opacity-0 transition duration-300 hover:opacity-100">
                                <div class="flex flex-col justify-center h-full px-4 py-2">
                                    <div class="text-center text-lg">{{ execute(radical.meaning, ' ') }}</div>
                                    <div class="mb-1 text-center text-lg">{{ execute(radical.reading, ' ')}}</div>
                                    <div class="text-center text-lg">{{ radical.strokes }}</div>
                                </div>
                            </div>
                        </Link>
                    </div>
                </div>
            </div>
    </div>
</template>

<style scoped>

</style>
