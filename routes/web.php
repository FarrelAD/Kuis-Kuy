<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');


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
Route::get('/signup', [AuthController::class, 'showSignup']);
Route::post('/signup', [AuthController::class, 'signup'])
    ->name('signup.post');
Route::post('/login', [AuthController::class, 'login'])
    ->name('login.post');

Route::middleware([AuthMiddleware::class])->group(function () {
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
});
