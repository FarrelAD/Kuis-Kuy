<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


// Player route
Route::get('/prepare', function () {
    return view('player.preparation');
});


// Teacher route
Route::get('/dashboard', function () {
    return view('teacher.dashboard');
});
