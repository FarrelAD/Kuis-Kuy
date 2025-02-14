<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerJoinRequest;
use App\Http\Requests\StartGameRequest;
use App\Http\Requests\StartQuizRequest;
use App\Http\Requests\SubmitQuizRequest;
use App\Models\Player;
use App\Models\Question;
use App\Models\QuizCodes;
use App\Models\Quizzez;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

        return redirect()->route('player.show-start-quiz')
            ->with('id_player', $credential['id_player'])
            ->with('id_quiz', $credential['id_quiz'])
            ->with('questions', $questions);
    }

    public function showStartQuiz()
    {
        return view('player.quiz');
    }

    public function showLeaderboard()
    {
        return view('player.leaderboard');
    }

    public function submitQuiz(SubmitQuizRequest $req)
    {
        $credentials = $req->validated();

        $real_questions = Question::where('id_quiz', $credentials['id_quiz'])->get();

        $score = 0;
        $score_per_question = 100 / count($credentials['answers']);

        for ($i=0; $i < count($credentials['answers']); $i++) { 
            $score += $credentials['answers'][$i] == $real_questions[$i]->correct_answer ? $score_per_question : 0;
        }


        try {
            $player = Player::findOrFail($credentials['id_player']);
            $player->score = $score;
            
            $player->save();

            $players = Player::where('id_quiz', $credentials['id_quiz'])->get();
    
            return redirect()->route('player.leaderboard')
                ->with('players', $players);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Player not found'
            ], 404);
        }
    }
}
