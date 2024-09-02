<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGoal extends Model
{
    use HasFactory;

    protected $table = 'user_goal';

    protected $fillable = [
        'user_id',
        'goal_id',
        'achieved_at'
    ];
}
