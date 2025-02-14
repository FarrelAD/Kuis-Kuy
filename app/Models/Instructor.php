<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Instructor extends Model implements Authenticatable
{
    use HasFactory;
    use \Illuminate\Auth\Authenticatable;

    public $timestamps = false;
    protected $fillable = [
        'username', 
        'password'
    ];

    public function quiz()
    {
        return $this->hasMany(Quiz::class);
    }
}
