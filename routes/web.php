<?php

use App\Http\Controllers\InstructorAuthController;
use App\Http\Controllers\PlayerQuizController;
use App\Http\Controllers\QuizController;
use App\Http\Middleware\InstructorAuthMiddleware;
use App\Http\Middleware\PlayerAuthMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('home');


// Public player route
Route::post('/quiz-preparation', [PlayerQuizController::class, 'validateGameCode'])
    ->name('quiz-preparation');
Route::post('/enter-room', [PlayerQuizController::class, 'enterRoom'])
    ->name('enter-quiz-room');


Route::middleware([PlayerAuthMiddleware::class])->group(function () {
    
    // Protected player route
    Route::get('/playground/{id}', [PlayerQuizController::class, 'playground'])
        ->name('player.playground');
    Route::post('/quiz/start', [PlayerQuizController::class, 'startQuiz'])
        ->name('player.start-quiz');
    Route::get('/quiz', [PlayerQuizController::class, 'showStartQuiz'])
        ->name('player.show-start-quiz');
    Route::post('/quiz/submit', [PlayerQuizController::class, 'submitQuiz'])
        ->name('player.submit-quiz');
    Route::get('/leaderboard', [PlayerQuizController::class, 'showLeaderboard'])
        ->name('player.leaderboard');
});



// Public instructor route
Route::get('/signup', [InstructorAuthController::class, 'showSignup']);
Route::post('/signup', [InstructorAuthController::class, 'signup'])
    ->name('signup.post');
Route::post('/login', [InstructorAuthController::class, 'login'])
    ->name('login.post');


Route::middleware([InstructorAuthMiddleware::class])->group(function () {

    // Protected instructor route
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
