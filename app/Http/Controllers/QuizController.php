<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quizzez;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function create(Request $req)
    {
        DB::beginTransaction();

        try {
            $data = $req->json()->all();

            $quiz = Quizzez::create([
                'id_instructor' => Auth::id(),
                'name' => $data['name'],
                'shared_public_key' => 'RANDOM_KEY',
                'total_question' => $data['total_question'],
                'date_created' => now(),
            ]);

            $questions = [];
            foreach ($data['questions'] as $item) {
                $questions[] = new Question([
                    'question' => $item['question'],
                    'answer_a' => $item['answer_a'],
                    'answer_b' => $item['answer_b'],
                    'answer_c' => $item['answer_c'],
                    'answer_d' => $item['answer_d'],
                    'correct_answer' => $item['correct_answer'],
                    'id_quiz' => $quiz->id_quiz
                ]);
            }

            $quiz->questions()->saveMany($questions);

            DB::commit();
            return response()->json([
                'message' => 'Data saved successfully'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Error saving data',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
