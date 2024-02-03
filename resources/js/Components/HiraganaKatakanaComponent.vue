<script>
export default {
    data() {
        return {
            isHiragana: true,
            hiraganaCharacters: ['あ', 'い', 'う', 'え', 'お'],
            katakanaCharacters: ['ア', 'イ', 'ウ', 'エ', 'オ'],
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
        <h1>{{ currentAlphabet }}</h1>

        <div class="px-2 py-3 w-auto flex justify-center">
            <table class=" text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead>
                <tr>
                    <th class="text-black border-2 border-gray-100 text-center text-3xl p-1">あ</th>
                    <th class="text-black border-2 border-gray-100 text-center  text-3xl p-1">か</th>
                    <th class="text-black border-2 border-gray-100 text-center text-3xl p-1">さ</th>
                    <th class="text-black border-2 border-gray-100 text-center text-3xl p-1">た</th>
                    <th class="text-black border-2 border-gray-100 text-center text-3xl p-1">な</th>
                    <th class="text-black border-2 border-gray-100 text-center text-3xl p-1">は</th>
                    <th class="text-black border-2 border-gray-100 text-center text-3xl p-1">ま</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                </tr>
                <tr>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                </tr>
                <tr>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                </tr>
                <tr>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                    <td class="text-black border-2 border-gray-100 text-center text-3xl p-1">い</td>
                </tr>
                </tbody>
            </table>
        </div>

        <button @click="toggleAlphabet">Переключить алфавит</button>
    </div>
</template>

<style scoped>

</style>
