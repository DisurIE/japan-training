
<script setup>
import { Head, Link } from '@inertiajs/vue3';
import HeaderComponent from "@/Components/HeaderComponent.vue";
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

</script>

<script>
import {useForm} from "@inertiajs/vue3";
export default {
    props: {
        radical: Object
    },
    data(props) {
        let form = null;
        let $path = null;
        let $data = null;
        if(props.radical !== undefined) {
            form = useForm({
                character: props.radical.character,
                meaning: props.radical.meaning,
                reading: props.radical.reading,
                image: props.radical.image,
                kanjis: props.radical.kanjis,
                strokes: props.radical.strokes,
            });
            $path = `/radicals/${props.radical.id}`
            $data = {
                _method: "put",
                character: form.character,
                meaning: form.meaning,
                reading: form.reading,
                image: form.image,
                kanjis: form.kanjis,
                strokes: form.strokes,
            };
        }
        else{
            form = useForm({
                character: '',
                meaning: '',
                reading: '',
                image: '',
                kanjis: '',
                strokes: '',
            });
            $path = `/radicals`
            $data = {
                _method: "post",
                character: form.character,
                meaning: form.meaning,
                reading: form.reading,
                image: form.image,
                kanjis: form.kanjis,
                strokes: form.strokes,
            }
        }
        const submit = () => {
            if(props.radical !== undefined) {
                this.form.put($path, $data);
            }
            else{
                this.form.post($path, $data);
            }
        };
        return {form, submit}
    },
}

</script>

<template>
    <div>
        <HeaderComponent/>
        <Head title="RadicalsCreateEdit" />


        <form @submit.prevent="submit" class="max-w-sm mx-auto">
            <div class="mb-5">
                <label for="character" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Character</label>
                <input v-model="form.character" type="text" name="character" id="character" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="character" required />
            </div>
            <div class="mb-5">
                <label for="meaning" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meaning</label>
                <input v-model="form.meaning" type="text" name="meaning" id="meaning" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="meaning" required />
            </div>
            <div class="mb-5">
                <label for="reading" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reading</label>
                <input v-model="form.reading" type="text" name="reading" id="reading" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="reading" required />
            </div>
            <div class="mb-5">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                <input v-model="form.image" type="text" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="image" required />
            </div>
            <!--     тут список кандзи       -->
            <div class="mb-5">
                <label for="kanjis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose a relationship with kanjis</label>
                <select v-model="form.kanjis" name="kanjis" id="kanjis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option selected>Choose a relationship with kanjis</option>
                    <option value="一">一</option>
                    <option value="九">九</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="strokes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Level</label>
                <input v-model="form.strokes" name="strokes" type="number" id="strokes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="strokes" required />
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-300 dark:hover:bg-blue-400 dark:focus:ring-blue-500">Submit</button>
        </form>

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
