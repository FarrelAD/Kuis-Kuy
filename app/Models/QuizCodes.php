<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Str;

class QuizCodes extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'code', 
        'expired_at',
        'game_duration',
        'quiz_id'
    ];

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    public static function generate(int $id_quiz, int $game_duration)
    {
        return self::create([
            'code' => strtoupper(Str::random(4)),
            'expired_at' => Carbon::now()->addMinutes(10),
            'game_duration' => $game_duration,
            'quiz_id' => $id_quiz
        ]);
    }

    public function isExpired(): bool
    {
        return Carbon::now()->greaterThan($this->expired_at);
    }
}
