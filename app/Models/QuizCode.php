<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizCode extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'code', 
        'expired_at',
        'id_quiz'
    ];

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quizzez::class, 'id_quiz', 'id_quiz');
    }
}
