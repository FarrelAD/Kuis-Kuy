<?php

namespace App\Http\Controllers;

use App\Http\Requests\StartGameRequest;
use App\Models\QuizCodes;

class PlayerQuizController extends Controller
{
    public function showPreparation()
    {
        return view('player.preparation');
    }

    public function enterGameRoom(StartGameRequest $req)
    {
        $credentials = $req->validated();

        if (QuizCodes::where('code', implode('', $credentials['game_code']))->first()) {
            $req->session()->put('user', [
                'role' => 'player'
            ]);
            return redirect()->route('player.preparation');
        }

        return response()->json([
            'message' => 'game code can not found',
            'raw' => implode('', $credentials['game_code'])
        ], 404);
    }
}
