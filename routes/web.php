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

Route::get('/destinasi', [\App\Http\Controllers\DestinasiController::class, 'index'])->name('destinasi.index');

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
    
    // Sejarah Routes
    Route::get('/sejarah/edit', [\App\Http\Controllers\Admin\SejarahController::class, 'edit'])->name('admin.sejarah.edit');
    Route::post('/sejarah/update', [\App\Http\Controllers\Admin\SejarahController::class, 'update'])->name('admin.sejarah.update');
    
    // Sejarah Bangunan Routes
    Route::get('/sejarah-bangunan', [\App\Http\Controllers\Admin\SejarahBangunanController::class, 'index'])->name('admin.sejarah-bangunan.index');
    Route::get('/sejarah-bangunan/{sejarah_bangunan}', [\App\Http\Controllers\Admin\SejarahBangunanController::class, 'show'])->name('admin.sejarah-bangunan.show');
    Route::post('/sejarah-bangunan', [\App\Http\Controllers\Admin\SejarahBangunanController::class, 'store'])->name('admin.sejarah-bangunan.store');
    Route::put('/sejarah-bangunan/{sejarah_bangunan}', [\App\Http\Controllers\Admin\SejarahBangunanController::class, 'update'])->name('admin.sejarah-bangunan.update');
    Route::delete('/sejarah-bangunan/{sejarah_bangunan}', [\App\Http\Controllers\Admin\SejarahBangunanController::class, 'destroy'])->name('admin.sejarah-bangunan.destroy');

    // Settings Routes
    Route::get('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'edit'])->name('admin.settings.edit');
    Route::post('/settings/update', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin.settings.update');

    // Destinasi Routes (Single Page CRUD)
    Route::get('/edit-destinasi', [\App\Http\Controllers\Admin\DestinasiController::class, 'editView'])->name('admin.edit-destinasi');

    Route::resource('destinasi', \App\Http\Controllers\Admin\DestinasiController::class);
    
    // API Routes for Destinasi (for AJAX)
    Route::prefix('api')->group(function () {
        Route::get('/destinasi/{id}', [\App\Http\Controllers\Admin\DestinasiController::class, 'getDestinasi']);
        Route::post('/destinasi', [\App\Http\Controllers\Admin\DestinasiController::class, 'apiStore']);
        Route::put('/destinasi/{id}', [\App\Http\Controllers\Admin\DestinasiController::class, 'apiUpdate']);
        Route::delete('/destinasi/{id}', [\App\Http\Controllers\Admin\DestinasiController::class, 'apiDestroy']);
    });
    
    // Event Routes
    Route::get('/event', [\App\Http\Controllers\Admin\EventController::class, 'index'])->name('admin.event.index');
    Route::get('/event/{event}', [\App\Http\Controllers\Admin\EventController::class, 'show'])->name('admin.event.show');
    Route::post('/event', [\App\Http\Controllers\Admin\EventController::class, 'store'])->name('admin.event.store');
    Route::put('/event/{event}', [\App\Http\Controllers\Admin\EventController::class, 'update'])->name('admin.event.update');
    Route::delete('/event/{event}', [\App\Http\Controllers\Admin\EventController::class, 'destroy'])->name('admin.event.destroy');
    
    // News Routes
    Route::get('/news', [\App\Http\Controllers\Admin\NewsController::class, 'index'])->name('admin.news.index');
    Route::get('/news/{news}', [\App\Http\Controllers\Admin\NewsController::class, 'show'])->name('admin.news.show');
    Route::post('/news', [\App\Http\Controllers\Admin\NewsController::class, 'store'])->name('admin.news.store');
    Route::put('/news/{news}', [\App\Http\Controllers\Admin\NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/news/{news}', [\App\Http\Controllers\Admin\NewsController::class, 'destroy'])->name('admin.news.destroy');
    
    // Feedback Routes (Admin)
    Route::get('/feedback', [\App\Http\Controllers\Admin\FeedbackController::class, 'index'])->name('admin.feedback.index');
    Route::delete('/feedback/{feedback}', [\App\Http\Controllers\Admin\FeedbackController::class, 'destroy'])->name('admin.feedback.destroy');
});