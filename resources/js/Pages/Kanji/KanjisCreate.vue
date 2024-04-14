
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
        kanji: Object
    },
    data(props) {
        let form = null;
        let $path = null;
        let $data = null;
        if(props.kanji !== undefined) {
            form = useForm({
                character: props.kanji.character,
                meaning: props.kanji.meaning,
                onyomi: props.kanji.onyomi,
                kunyomi: props.kanji.kunyomi,
                important_reading: props.kanji.important_reading,
                level: props.kanji.level,
            });
            $path = `/kanjis/${props.kanji.id}`
            $data = {
                _method: "put",
                character: form.character,
                meaning: form.meaning,
                onyomi: form.onyomi,
                kunyomi: form.kunyomi,
                important_reading: form.important_reading,
                level: form.level,
            };
        }
        else{
            form = useForm({
                character: '',
                meaning: '',
                onyomi: '',
                kunyomi: '',
                important_reading: '',
                level: '',
            });
                $path = `/kanjis`
                $data = {
                    _method: "post",
                    character: form.character,
                    meaning: form.meaning,
                    onyomi: form.onyomi,
                    kunyomi: form.kunyomi,
                    important_reading: form.important_reading,
                    level: form.level,
                }
        }
        const submit = () => {
            if(props.kanji !== undefined) {
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
        <Head title="KanjisCreate" />


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
                <label for="onyomi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Onyomi</label>
                <input v-model="form.onyomi" type="text" name="onyomi" id="onyomi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="onyomi" required />
            </div>
            <div class="mb-5">
                <label for="kunyomi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kunyomi</label>
                <input v-model="form.kunyomi" type="text" name="kunyomi" id="kunyomi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="kunyomi" required />
            </div>
            <div class="mb-5">
                <label for="important_reading" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an Important reading</label>
                <select v-model="form.important_reading" name="important_reading" id="important_reading" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option selected>Choose an important reading</option>
                    <option value="kunyomi">kunyomi</option>
                    <option value="onyomi">onyomi</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Level</label>
                <input v-model="form.level" name="level" type="number" id="level" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="level" required />
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
