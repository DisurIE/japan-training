<?php

use App\Http\Controllers as Ctr;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [Ctr\MainController::class, 'index'])->name('main.index');

Route::controller(\App\Kanji\Controllers\KanjiController::class)->group(function () {
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
    Route::put('/radicals/{radical}', 'UpdateController')->name('radicals.update');
    Route::get('/radicals/{radical:character}/edit', 'EditController')->name('radicals.edit');
});


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['namespace' => 'App\Http\Controllers\Exercise'], function () {
    Route::get('/dashboard/sentences', 'IndexController')->name('dashboard.exercise.index');
    Route::get('/dashboard/sentences/{level}', 'ShowController')->name('dashboard.exercise.show');
    Route::post('/dashboard/sentences/{id}', 'StoreController')->name('dashboard.exercise.store');
})->middleware(['auth', 'verified']);

Route::group(['prefix' => '/dashboard/kanjis'], function () {
    Route::get('/',[Ctr\ProfileKanjisController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.kanjis.index');
    Route::get('/{level}',[Ctr\ProfileKanjisController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard.kanjis.show');
    Route::post('/{level}',[Ctr\ProfileKanjisController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard.kanjis.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/progress', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
