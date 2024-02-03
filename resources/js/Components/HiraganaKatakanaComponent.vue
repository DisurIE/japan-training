<script>
export default {
    data() {
        return {
            isHiragana: true,
            hiraganaCharacters: [
                ['あ', 'い', 'う', 'え', 'お'],
                ['か', 'き', 'く', 'け', 'こ'],
                ['さ', 'し', 'す', 'せ', 'そ'],
                ['た', 'ち', 'つ', 'て', 'と'],
                ['な', 'に', 'ぬ', 'ね', 'の'],
                ['は', 'ひ', 'ふ', 'へ', 'ほ'],
                ['ま', 'み', 'む', 'め', 'も'],
                ['や', ' ', 'ゆ', ' ', 'よ'],
                ['ら', 'り', 'る', 'れ', 'ろ'],
                ['わ', ' ', ' ', ' ', 'を'],
                ['ん', ' ', ' ', ' ', ' ',],
            ],
            katakanaCharacters: [
                ['ア', 'イ', 'ウ', 'エ', 'オ'],
                ['カ', 'キ', 'ク', 'ケ', 'コ'],
                ['サ', 'シ', 'ス', 'セ', 'ソ'],
                ['タ', 'チ', 'ツ', 'テ', 'ト'],
                ['ナ', 'ニ', 'ヌ', 'ネ', 'ノ'],
                ['ハ', 'ヒ', 'フ', 'ヘ', 'ホ'],
                ['マ', 'ミ', 'ム', 'メ', 'モ'],
                ['ヤ', ' ', 'ユ', ' ', 'ヨ'],
                ['ラ', 'リ', 'ル', 'レ', 'ロ'],
                ['ワ', ' ', ' ', ' ', 'ヲ'],
                ['ン', ' ', ' ', ' ', ' ',]
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
                <tr>
                    <td class="text-center" v-for="rowIndex in currentAlphabet.length">
                        <input type="checkbox" v-bind:id="'#column' + rowIndex">
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
