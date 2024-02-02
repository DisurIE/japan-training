<script setup>

import HeaderComponent from "@/Components/HeaderComponent.vue";
</script>

<template>
    <HeaderComponent/>
    <div class="container mx-auto">
        <h1 class="text-3xl font-semibold mb-6">Hiragana Table</h1>

        <div class="grid grid-cols-5 gap-4">

            <!-- Table Header -->
            <div class="col-span-5 grid grid-cols-5 bg-gray-300 p-2 text-center">
                <div class="col-span-1"></div>
                <div class="col-span-1">あ</div>
                <div class="col-span-1">い</div>
                <div class="col-span-1">う</div>
                <div class="col-span-1">え</div>
                <div class="col-span-1">お</div>
            </div>

            <!-- Table Rows -->
            <div class="col-span-5 grid grid-cols-5 gap-4">
                <!-- Row 1 -->
                <div class="col-span-1 font-semibold">あ</div>
                <div class="col-span-1">あ</div>
                <div class="col-span-1">い</div>
                <div class="col-span-1">う</div>
                <div class="col-span-1">え</div>
                <div class="col-span-1">お</div>

                <!-- Row 2 -->
                <div class="col-span-1 font-semibold">か</div>
                <div class="col-span-1">か</div>
                <div class="col-span-1">き</div>
                <div class="col-span-1">く</div>
                <div class="col-span-1">け</div>
                <div class="col-span-1">こ</div>

                <!-- Row 3 -->
                <div class="col-span-1 font-semibold">さ</div>
                <div class="col-span-1">さ</div>
                <div class="col-span-1">し</div>
                <div class="col-span-1">す</div>
                <div class="col-span-1">せ</div>
                <div class="col-span-1">そ</div>

                <!-- Row 4 -->
                <div class="col-span-1 font-semibold">た</div>
                <div class="col-span-1">た</div>
                <div class="col-span-1">ち</div>
                <div class="col-span-1">つ</div>
                <div class="col-span-1">て</div>
                <div class="col-span-1">と</div>

                <!-- Row 5 -->
                <div class="col-span-1 font-semibold">な</div>
                <div class="col-span-1">な</div>
                <div class="col-span-1">に</div>
                <div class="col-span-1">ぬ</div>
                <div class="col-span-1">ね</div>
                <div class="col-span-1">の</div>

                <div class="col-span-1 font-semibold">は</div>
                <div class="col-span-1">は</div>
                <div class="col-span-1">ひ</div>
                <div class="col-span-1">ふ</div>
                <div class="col-span-1">へ</div>
                <div class="col-span-1">ほ</div>

                <!-- Row 7 -->
                <div class="col-span-1 font-semibold">ま</div>
                <div class="col-span-1">ま</div>
                <div class="col-span-1">み</div>
                <div class="col-span-1">む</div>
                <div class="col-span-1">め</div>
                <div class="col-span-1">も</div>



            </div>
        </div>
    </div>
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
