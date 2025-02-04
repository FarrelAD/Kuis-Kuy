<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlayerAnswer extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = 'player_answers';
    protected $primaryKey = ['id_player', 'id_question'];
    public $timestamps = false;
    protected $fillable = [
        'id_player',
        'id_question',
        'selected_answer'
    ];

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class. 'id_player', 'id_player');
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'id_question', 'id_question');
    }
}
