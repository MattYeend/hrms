<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'position',
        'created_at',
        'updated_at'
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
