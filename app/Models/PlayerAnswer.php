<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlayerAnswer extends Model
{
    use HasFactory;

    protected $primaryKey = [
        'id_player', 
        'id_question'
    ];
    public $timestamps = false;
    protected $fillable = [
        'player_id',
        'question_id',
        'selected_answer'
    ];

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
