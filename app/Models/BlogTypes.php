<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTypes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function blogs(){
        return $this->belongsTo(Blogs::class);
    }
}
