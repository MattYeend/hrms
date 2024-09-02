<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayEntitlement extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
        'year_start',
        'year_end', 
        'created_at',
        'updated_at'
    ];
}
