<script>
export default {
    data() {
        return {
            isHiragana: true,
            hiraganaCharacters: [
                ['あ', 'い', 'う', 'え', 'お'],
                ['あ', 'い', 'う', 'え', 'お'],
                ['あ', 'い', 'う', 'え', 'お'],
                ['あ', 'い', 'う', 'え', 'お'],
                ['あ', 'い', 'う', 'え', 'お'],
            ],
            katakanaCharacters: [
                ['ア', 'イ', 'ウ', 'エ', 'オ'],
                ['ア', 'イ', 'ウ', 'エ', 'オ'],
                ['ア', 'イ', 'ウ', 'エ', 'オ'],
                ['ア', 'イ', 'ウ', 'エ', 'オ'],
                ['ア', 'イ', 'ウ', 'エ', 'オ'],
            ],
        };
    },
    computed: {
        currentAlphabet() {
            return this.isHiragana ? this.hiraganaCharacters : this.katakanaCharacters;
        },
    },
    methods: {
        toggleAlphabet() {
            this.isHiragana = !this.isHiragana;
        },
    },
};

</script>

<template>
    <div>


        <div class="px-2 py-3 w-auto flex justify-center">
            <table class=" text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                <tbody>
                <tr v-for="colIndex in 5" :key="colIndex">
                    <td v-for="row in currentAlphabet" :key="row[colIndex - 1]" class="text-black border-2 border-gray-100 text-center text-3xl p-1">
                        {{ row[colIndex - 1] }}
                    </td>
                </tr>

                </tbody>
            </table>
        </div>

        <button @click="toggleAlphabet">Переключить алфавит</button>
    </div>
</template>

<style scoped>

</style>
