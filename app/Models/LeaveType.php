<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LeaveType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'created_at',
        'updated_at'
    ];

    protected static function boot(){
        parent::boot();
        static::saving(function($leaveType){
            if(empty($leaveType->slug)){
                $leaveType->slug = Str::slug($leaveType->name);
                $originalSlug = $leaveType->slug;
                $counter = 1;
                while(static::whereSlug($leaveType->slug)->exists()){
                    $leaveType->slug = $originalSlug . '-' . $counter++;
                }
            }
        });
    }
}
