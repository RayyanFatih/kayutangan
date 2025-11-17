<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/profil', function () {
    return view('profil');
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