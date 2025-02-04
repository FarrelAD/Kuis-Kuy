<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Player extends Model
{
    use HasFactory;

    protected $table = 'players';
    protected $primaryKey = 'id_player';
    public $timestamps = false;
    protected $fillable = [
        'full_name',
        'score',
        'id_quiz'
    ];

    public function quizzez(): BelongsTo
    {
        return $this->belongsTo(Quizzez::class, 'id_quiz', 'id_quiz');
    }
}
