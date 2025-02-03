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
Route::get('/questions/1', function () {
    return view('player.questions');
});
Route::get('/leaderboard', function () {
    return view('player.leaderboard');
});


// Instructor route
Route::get('/dashboard', function () {
    return view('instructor.dashboard');
});
Route::get('/new-quiz', function () {
    return view('instructor.new-quiz');
});
