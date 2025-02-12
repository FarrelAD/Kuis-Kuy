<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerJoinRequest;
use App\Http\Requests\StartGameRequest;
use App\Http\Requests\StartQuizRequest;
use App\Models\Player;
use App\Models\Question;
use App\Models\QuizCodes;
use App\Models\Quizzez;
use Illuminate\Support\Facades\Auth;

class PlayerQuizController extends Controller
{
    public function validateGameCode(StartGameRequest $req)
    {
        $credentials = $req->validated();

        $quiz = QuizCodes::where('code', implode('', $credentials['game_code']))->first();

        if ($quiz) {
            return view('player.preparation', ['id_quiz' => $quiz->id_quiz]);
        }

        return response()->json([
            'message' => 'game code can not found',
            'raw' => implode('', $credentials['game_code'])
        ], 404);
    }

    public function enterRoom(PlayerJoinRequest $req)
    {
        $credentials = $req->validated();

        $player = Player::create($credentials);

        auth()->guard('player')->login($player);

        return redirect()->route('player.playground', ['id' => $credentials['id_quiz']]);
    }

    public function playground(int $id)
    {
        $quiz = Quizzez::find($id);

        $player = Auth::guard('player')->user();

        return view('player.playground', ['quiz' => $quiz, 'player' => $player]);
    }

    public function startQuiz(StartQuizRequest $req)
    {
        $credential = $req->validated();

        $questions = Question::where('id_quiz', $credential['id_quiz'])
            ->get()
            ->makeHidden(['correct_answer']);

        return redirect()->route('player.show-start-quiz')->with('questions', $questions);
    }

    public function showStartQuiz()
    {
        return view('player.quiz');
    }

    public function showLeaderboard()
    {
        return view('player.leaderboard');
    }
}
