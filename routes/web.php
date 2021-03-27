<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\SiteController::class, 'index'])->name('index');
Route::get('/dashboard', [App\Http\Controllers\SiteController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('/setlang/{locale}',[App\Http\Controllers\LanguageController::class,'set_language'])->name('set_language');

require __DIR__.'/auth.php';