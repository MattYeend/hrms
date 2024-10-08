<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Difficulty extends Model
{
    use HasFactory;

    protected $fillable = [
        'easy',
        'medium',
        'hard',
        'created_at',
        'updated_at'
    ];
}
