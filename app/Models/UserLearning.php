<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLearning extends Model
{
    use HasFactory;

    protected $table = 'user_learning';

    protected $fillable = [
        'user_id',
        'learning_id'
    ];
}
