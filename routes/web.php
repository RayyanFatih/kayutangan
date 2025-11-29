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

Route::get('/destinasi', [App\Http\Controllers\DestinasiController::class, 'index'])->name('user.destinasi.index');
Route::get('/destinasi/{slug}', [App\Http\Controllers\DestinasiController::class, 'show'])->name('user.destinasi.show');


Route::get('/galeri', function () {
    return view('galeri');
});

// Feedback Routes
Route::get('/feedback', [\App\Http\Controllers\FeedbackController::class, 'index'])->name('feedback.index');
Route::post('/feedback', [\App\Http\Controllers\FeedbackController::class, 'store'])->name('feedback.store');

// ======================
// Admin Routes
// ======================

Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'beranda'])->name('dashboard');
    Route::get('/beranda', [\App\Http\Controllers\Admin\DashboardController::class, 'beranda'])->name('beranda');

    // Profil
    Route::get('/profil/edit', [\App\Http\Controllers\Admin\ProfilController::class, 'edit'])->name('profil.edit');
    Route::post('/profil/update', [\App\Http\Controllers\Admin\ProfilController::class, 'update'])->name('profil.update');

    // CRUD Destinasi
     Route::resource('destinasi', \App\Http\Controllers\Admin\DestinasiController::class)
        ->parameters(['destinasi' => 'destinasi']);
    // CRUD Pengurus
    Route::resource('pengurus', \App\Http\Controllers\Admin\PengurusController::class);
});