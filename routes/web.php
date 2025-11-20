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

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'beranda'])->name('admin.dashboard');
    Route::get('/beranda', [\App\Http\Controllers\Admin\DashboardController::class, 'beranda'])->name('admin.beranda');
});