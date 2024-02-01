<?php

use App\Helpers\JsonHandler;
use App\Http\Controllers as Ctr;
use App\Http\Controllers\ProfileController;
use App\Models\Kanji;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [Ctr\MainController::class, 'index'])->name('main.index');

Route::get('/kanjis', [Ctr\KanjiController::class, 'index'])->name('kanjis.index');
Route::get('/kanjis/{kanji}', [Ctr\KanjiController::class, 'show'])->name('kanjis.show');


Route::get('/radicals', function () {
    return Inertia::render('Radicals');
})->name('radicals.index');

Route::get('/radicals/{radical}', function () {
    return Inertia::render('RadicalsShow');
})->name('radicals.index');

//Route::get('/dashboard', function () {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

require __DIR__.'/auth.php';
