<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/profil', [\App\Http\Controllers\ProfilViewController::class, 'show'])->name('profil.show');

Route::get('/sejarah', [\App\Http\Controllers\SejarahViewController::class, 'show'])->name('sejarah.show');
Route::get('/sejarah/edit-view', [\App\Http\Controllers\SejarahViewController::class, 'editView'])->name('sejarah.edit-view');

Route::get('/maps', function () {
    return view('maps');
});

Route::get('/event&news', [\App\Http\Controllers\EventNewsViewController::class, 'index'])->name('event-news.index');

Route::get('/news', [\App\Http\Controllers\EventNewsViewController::class, 'newsDetail'])->name('news.detail');

Route::get('/event', [\App\Http\Controllers\EventNewsViewController::class, 'eventDetail'])->name('event.detail');

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