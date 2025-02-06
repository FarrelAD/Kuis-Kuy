<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quizzez extends Model
{
    use HasFactory;

    protected $table = 'quizzez';
    protected $primaryKey = 'id_quiz';
    public $timestamps = false;
    protected $fillable = [
        'id_instructor',
        'name',
        'shared_public_key',
        'total_question',
        'date_created',
    ];

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class, 'id_instructor', 'id_instructor');
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'id_quiz');
    }
}
