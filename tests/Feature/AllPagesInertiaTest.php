<?php

use Database\Seeders\KanjiSeeder;
use Illuminate\Support\Facades\Artisan;
use Inertia\Testing\AssertableInertia as Assert;

it('renders public pages', function (string $path, string $component) {
    $this->seed(KanjiSeeder::class);
    Artisan::call('db:seed');
    $this->get($path)
        ->assertOk()
        ->assertInertia(fn(Assert $page) => $page->component($component));

})->with([
    [
        'path' => '/',
        'component' => 'Main',
    ],
    [
        'path' => '/kanjis',
        'component' => 'Kanji/Kanjis',
    ],
    [
        'path' => '/kanjis/一',
        'component' => 'Kanji/KanjisShow',
    ],
    [
        'path' => '/radicals',
        'component' => 'Radicals',
    ],
    [
        'path' => '/radicals/儿',
        'component' => 'RadicalsShow',
    ],
    [
        'path' => '/hiragana-katakana',
        'component' => 'HiraganaKatakana',
    ],
]);
