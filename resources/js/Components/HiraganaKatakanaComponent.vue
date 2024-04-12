<script>
export default {
    data() {
        return {
            isHiragana: true,
            visibility: true,
            mean: '',
            meanInput: '',
            chr: '',
            inc: 0,
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
            meaningCharacters: [
                ['a', 'i', 'u', 'e', 'o'],
                ['ka', 'ki', 'ku', 'ke', 'ko'],
                ['sa', 'shi', 'su', 'se', 'so'],
                ['ta', 'chi', 'tsu', 'te', 'to'],
                ['na', 'ni', 'nu', 'ne', 'no'],
                ['ha', 'hi', 'fu', 'he', 'ho'],
                ['ma', 'mi', 'mu', 'me', 'mo'],
                ['ya', ' ', 'yu', ' ', 'yo'],
                ['ra', 'ri', 'ru', 're', 'ro'],
                ['wa', ' ', ' ', ' ', 'wo'],
                ['n', ' ', ' ', ' ', ' ',]
            ],
            activeHiraganaCharacters: [],
            activeKatakanaCharacters: [],
            activeMeaningCharacters: [],
        };
    },
    computed: {
        currentAlphabet() {
            return this.isHiragana ? this.hiraganaCharacters : this.katakanaCharacters;
        },
        activeAlphabet() {
            return this.isHiragana ? this.activeHiraganaCharacters : this.activeKatakanaCharacters;
        }
    },
    methods: {
        changeVisibility(){
            if(this.activeHiraganaCharacters.length === 0) {

            }
            else{
                document.querySelector('.training').classList.toggle('hidden');
                this.visibility = false
            }
        },
        toggleAlphabet() {
            this.isHiragana = !this.isHiragana;
        },
        markCheckbox(e){
                let currentHiraganaArr = this.hiraganaCharacters[e.target._value - 1];
                let currentKatakanaArr = this.katakanaCharacters[e.target._value - 1];
                let currentMeaningArr = this.meaningCharacters[e.target._value - 1];
                if(e.target.checked) {
                    this.activeHiraganaCharacters = [...this.activeHiraganaCharacters, ...this.hiraganaCharacters[e.target._value - 1]].filter((character) => character !== ' ');
                    this.activeKatakanaCharacters = [...this.activeKatakanaCharacters, ...this.katakanaCharacters[e.target._value - 1]].filter((character) => character !== ' ');
                    this.activeMeaningCharacters = [...this.activeMeaningCharacters, ...this.meaningCharacters[e.target._value - 1]].filter((character) => character !== ' ');

                    console.log(this.activeHiraganaCharacters);
                    console.log(this.activeKatakanaCharacters);
                    console.log(this.activeMeaningCharacters);
                }
                else{
                    this.activeHiraganaCharacters = this.activeHiraganaCharacters.filter( function( el ) {
                        return !currentHiraganaArr.includes( el );
                    } );
                    this.activeKatakanaCharacters = this.activeKatakanaCharacters.filter( function( el ) {
                        return !currentKatakanaArr.includes( el );
                    } );
                    this.activeMeaningCharacters = this.activeMeaningCharacters.filter( function( el ) {
                        return !currentMeaningArr.includes( el );
                    } );
                    console.log(this.activeHiraganaCharacters);
                    console.log(this.activeKatakanaCharacters);
                    console.log(this.activeMeaningCharacters);
                }
        },
        markAllCheckbox(){
            let $checkboxes = document.querySelectorAll("input");
            $checkboxes.forEach( (e) => {
                    if(!e.checked){
                        e.click()
                    }
                }
            );
        },
        checkMeaning(arr){

            if(this.mean === this.meanInput){
                this.inc++;
                this.takeRandomChr(this.activeAlphabet);
                this.meanInput = '';
            }
        },
        takeRandomChr(arr){

            let rand = Math.floor(Math.random() * arr.length);
            console.log(rand);
            this.chr = arr[rand]
            this.mean = this.activeMeaningCharacters[rand]
        },
        resetAll() {
            this.activeHiraganaCharacters = [];
            this.activeKatakanaCharacters = [];
            this.activeMeaningCharacters = [];
            this.mean = '';
            this.meanInput = '';
            this.chr = '';
            this.inc = 0;
            this.visibility = true;
            document.querySelector('.training').classList.add('hidden');
            // Снимаем отметки с чекбоксов
            document.querySelectorAll('.checkbox-hiraganakatakana').forEach(checkbox => checkbox.checked = false);
        }
    },
};

</script>

<template>
    <div v-if="visibility">
        <div v-if="visibility" class="px-2 py-3 w-auto flex justify-center">
            <table class=" text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                <tbody>
                <tr v-for="colIndex in 5" :key="colIndex">
                    <td v-for="row in currentAlphabet" :key="row[colIndex - 1]" class="text-black border-2 border-gray-100 text-center text-3xl p-1">
                        {{ row[colIndex - 1] }}
                    </td>
                </tr>

                <tr>
                    <td class="text-center" v-for="rowIndex in currentAlphabet.length">
                        <input class="checkbox-hiraganakatakana"  @input="markCheckbox" v-bind:value="rowIndex" type="checkbox" v-bind:id="'#column' + rowIndex">
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="content-center w-auto flex justify-center gap-3">
            <button class="bg-gray-200 p-1.5 rounded" @click="toggleAlphabet">Переключить алфавит</button>
            <button class="bg-gray-200 p-1.5 rounded" @click="changeVisibility(); takeRandomChr(activeAlphabet)">Начать</button>
            <button class="bg-gray-200 p-1.5 rounded" @click="markAllCheckbox">выбрать все</button>
            <button class="bg-gray-200 p-1.5 rounded" @click="resetAll">очистить все</button>
        </div>
    </div>
    <div class="hidden training flex flex-col justify-center items-center">
        <div class="character text-7xl">{{ chr }}</div>
        <!-- <div class="meaning text-7xl">{{ mean }}</div> -->
        <div class="inc">{{ inc }}</div>
        <input v-model="meanInput" class="input-meaning mt-4 px-4 py-2 border border-gray-300 rounded-md" @input="checkMeaning(activeAlphabet)" placeholder="Введите значение" type="text">
        <button @click="resetAll" class=" mt-2 bg-gray-200 p-1.5 rounded">Назад</button>
    </div>
</template>

<style scoped>

</style>
