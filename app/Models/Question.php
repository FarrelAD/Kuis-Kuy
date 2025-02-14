<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';
    protected $primaryKey = 'id_question';
    public $timestamps = false;
    protected $fillable = [
        'question',
        'answer_a',
        'answer_b',
        'answer_c',
        'answer_d',
        'correct_answer',
        'quiz_id'
    ];

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    public function playerAnswers()
    {
        return $this->hasMany(PlayerAnswer::class);
    }
}
