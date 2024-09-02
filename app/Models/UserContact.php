<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'email',
        'phone', 
        'first_line',
        'second_line',
        'town',
        'city',
        'county',
        'country',
        'post_code',
        'relation_id',
        'created_at',
        'updated_at'
    ];
}
