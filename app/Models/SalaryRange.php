<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryRange extends Model
{
    use HasFactory;

    protected $fillable = [
        'lower_range',
        'upper_range',
        'created_at',
        'updated_at'
    ];
    
    public function jobs(){
        return $this->hasMany(Job::class);
    }
}
