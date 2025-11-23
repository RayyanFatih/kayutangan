<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/sejarah', function () {
    return view('sejarah');
});

Route::get('/maps', function () {
    return view('maps');
});

Route::get('/event&news', function () {
    return view('event&news');
});

Route::get('/news', function () {
    return view('news');
});

Route::get('event', function () {
    return view('event');
});

Route::get('/destinasi', function () {
    return view('destinasi');
});

Route::get('/galeri', function () {
    return view('galeri');
});

// Feedback Routes
Route::get('/feedback', [\App\Http\Controllers\FeedbackController::class, 'index'])->name('feedback.index');
Route::post('/feedback', [\App\Http\Controllers\FeedbackController::class, 'store'])->name('feedback.store');

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'beranda'])->name('admin.dashboard');
    Route::get('/beranda', [\App\Http\Controllers\Admin\DashboardController::class, 'beranda'])->name('admin.beranda');
    
    // Profil Routes
    Route::get('/profil/edit', [\App\Http\Controllers\Admin\ProfilController::class, 'edit'])->name('admin.profil.edit');
    Route::post('/profil/update', [\App\Http\Controllers\Admin\ProfilController::class, 'update'])->name('admin.profil.update');
    
    // Pengurus Routes
    Route::get('/pengurus', [\App\Http\Controllers\Admin\PengurusController::class, 'index'])->name('admin.pengurus.index');
    Route::get('/pengurus/{id}', [\App\Http\Controllers\Admin\PengurusController::class, 'show'])->name('admin.pengurus.show');
    Route::post('/pengurus', [\App\Http\Controllers\Admin\PengurusController::class, 'store'])->name('admin.pengurus.store');
    Route::put('/pengurus/{id}', [\App\Http\Controllers\Admin\PengurusController::class, 'update'])->name('admin.pengurus.update');
    Route::delete('/pengurus/{id}', [\App\Http\Controllers\Admin\PengurusController::class, 'destroy'])->name('admin.pengurus.destroy');
});