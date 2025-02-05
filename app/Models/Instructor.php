<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Instructor extends Model implements Authenticatable
{
    use HasFactory;
    use \Illuminate\Auth\Authenticatable;

    protected $table = 'instructors';
    protected $primaryKey = 'id_instructor';
    public $timestamps = false;
    protected $fillable = ['username', 'password'];
}
