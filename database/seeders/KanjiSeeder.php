<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KanjiSeeder extends Seeder
{
    private const KANJI = [
        [
            'character' => '一',
            'onyomi' => 'いち',
            'kunyomi' => 'ひと',
            'meaning' => 'one',
            'important_reading' => 'onyomi',
            'level' => 1,
        ],
        [
            'character' => '二',
            'onyomi' => 'に',
            'kunyomi' => 'ふた',
            'meaning' => 'two',
            'important_reading' => 'onyomi',
            'level' => 1,
        ],
        [
            'character' => '五',
            'onyomi' => 'ご',
            'kunyomi' => 'いつ',
            'meaning' => 'five',
            'important_reading' => 'onyomi',
            'level' => 2,
        ],
        [
            'character' => '月',
            'onyomi' => 'げつ, がつ',
            'kunyomi' => 'つき',
            'meaning' => 'moon, month',
            'important_reading' => 'onyomi',
            'level' => 2,
        ],
        [
            'character' => '時',
            'onyomi' => 'じ',
            'kunyomi' => 'とき',
            'meaning' => "time, o'clock, hour",
            'important_reading' => 'onyomi',
            'level' => 7,
        ],
        [
            'character' => '待',
            'onyomi' => 'たい',
            'kunyomi' => 'ま',
            'meaning' => 'wait',
            'important_reading' => 'kunyomi',
            'level' => 9,
        ],
    ];
    public function run(): void
    {
        DB::table('kanjis')->insertOrIgnore(self::KANJI);
    }
}
