<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\QuizController;
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
Route::get('/signup', [RegisterController::class, 'show']);
Route::post('/signup', [RegisterController::class, 'signup'])
    ->name('signup.post');
Route::get('/dashboard', function () {
    return view('instructor.dashboard');
})->name('instructor.dashboard');
Route::get('/new-quiz', [QuizController::class, 'showCreate']);
Route::post('/new-quiz', [QuizController::class, 'create'])
    ->name('instructor.new-quiz');
Route::get('/all-quiz', [QuizController::class, 'showAllQuiz']);
Route::get('/start-quiz/{id}', [QuizController::class, 'showStartQuiz'])
    ->name('instructor.start-quiz');
Route::post('/game-code', [QuizController::class, 'generateGameCode'])
    ->name('instructor.get-game-code');
