<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogLikes extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'blog_id'
    ];

    public function blog(){
        return $this->belongsTo(Blogs::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
