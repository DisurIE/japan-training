<?php

use App\Helpers\JsonHandler;
use App\Http\Controllers as Ctr;
use App\Http\Controllers\ProfileController;
use App\Models\Kanji;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [Ctr\MainController::class, 'index'])->name('main.index');

Route::controller(Ctr\KanjiController::class)->group(function () {
    Route::get('/kanjis', 'index')->name('kanjis.index');
    Route::get('/kanjis/create', 'create')->name('kanjis.create')->middleware('auth');
    Route::get('/kanjis/edit/{kanji}', 'edit')->name('kanjis.edit')->middleware('auth');
    Route::get('/kanjis/{kanji:character}',  'show')->name('kanjis.show');

    Route::post('/kanjis', 'store')->name('kanjis.store')->middleware('auth');
    Route::put('/kanjis/{kanji}', 'update')->name('kanjis.update')->middleware('auth');
});

Route::get('/hiragana-katakana', [Ctr\HiraganaKatakanaController::class, 'index'])->name('hiragana-katakana.index');

Route::get('/radicals', function () {
    return Inertia::render('Radicals');
})->name('radicals.index');

Route::get('/radicals/{radical}', function () {
    return Inertia::render('RadicalsShow');
})->name('radicals.show');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
