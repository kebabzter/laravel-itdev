<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExampleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/examples', [ExampleController::class, 'index'])->name('examples.index');

    // Routes dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    // In routes/web.php
    Route::post('/examples', [ExampleController::class, 'store'])->name('example.store');
    Route::delete('/examples/{example}', [ExampleController::class, 'destroy'])->name('example.destroy');
});


require __DIR__.'/auth.php';
