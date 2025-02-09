<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerJoinRequest;
use App\Http\Requests\StartGameRequest;
use App\Models\Player;
use App\Models\QuizCodes;

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

        return redirect()->route('player.playground');
    }
}
