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
    Route::get('/kanjis/{kanji:character}/edit', 'edit')->name('kanjis.edit')->middleware('auth');
    Route::get('/kanjis/{kanji:character}',  'show')->name('kanjis.show');

    Route::post('/kanjis', 'store')->name('kanjis.store')->middleware('auth');
    Route::put('/kanjis/{kanji}', 'update')->name('kanjis.update')->middleware('auth');
});

Route::get('/hiragana-katakana', [Ctr\HiraganaKatakanaController::class, 'index'])->name('hiragana-katakana.index');

Route::group(['namespace' => 'App\Http\Controllers\Radical'], function (){
    Route::get('/radicals', 'IndexController')->name('radicals.index');
    Route::post('/radicals', 'StoreController')->name('radicals.store');
    Route::get('/radicals/create', 'CreateController')->name('radicals.create');
    Route::get('/radicals/{radical:character}', 'ShowController')->name('radicals.show');
});


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/sentences',[Ctr\ProfileSentecesController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.sentences.index');
Route::get('/dashboard/sentences/{name}',[Ctr\ProfileSentecesController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard.sentences.show');

Route::get('/dashboard/kanjis', function () {
    return Inertia::render('DashboardKanjis');
})->middleware(['auth', 'verified'])->name('dashboard.kanjis.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/progress', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
