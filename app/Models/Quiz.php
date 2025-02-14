<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Quiz extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'instructor_id',
        'name',
        'total_question',
        'date_created',
    ];

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function quizCode(): HasOne
    {
        return $this->hasOne(QuizCodes::class);
    }
}
