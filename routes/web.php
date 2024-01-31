<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Main');
});

Route::get('/kanjis', function () {
    return Inertia::render('Kanjis');
})->name('kanjis.index');

Route::get('/kanjis/{kanji}', function () {
    return Inertia::render('KanjisShow');
})->name('kanjis.show');

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
