<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuizCodes;
use App\Models\Quizzez;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function showCreate()
    {
        return view('instructor.new-quiz');
    }

    public function showAllQuiz()
    {
        $quizzez = Quizzez::where('id_instructor', Auth::id())->get();

        return view('instructor.all-quiz', ['quizzez' => $quizzez]);
    }

    public function showStartQuiz(int $id)
    {
        try {
            $quiz = Quizzez::where('id_quiz', $id)->firstOrFail();
            return view('instructor.start-quiz', ['quiz' => $quiz]);
        } catch (ModelNotFoundException $e) {
            return view('instructor.start-quiz', ['quiz' => null]);
        }
    }

    public function generateGameCode(Request $req)
    {
        $data = $req->json()->all();

        if (!isset($data['id_quiz'])) {
            return response()->json([
                'message' => 'ID Quiz data is missing'
            ], 400);
        }

        $quiz_code = QuizCodes::generate($data['id_quiz'], $data['game_duration']);

        return response()->json([
            'quiz_code' => $quiz_code->code,
            'expired_at' => $quiz_code->expired_at
        ]);
    }

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
