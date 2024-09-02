<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTiles extends Model
{
    use HasFactory;

    protected $table = 'user_tiles';

    protected $fillable = [
        'user_id',
        'tile_id'
    ];
}
