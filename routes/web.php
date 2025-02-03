<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


// Player route
Route::get('/prepare', function () {
    return view('player.preparation');
});
Route::get('/playground', function () {
    return view('player.playground');
});


// Teacher route
Route::get('/dashboard', function () {
    return view('teacher.dashboard');
});
