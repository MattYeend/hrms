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
        static::creating(function($leaveType){
            $leaveType->slug = self::createUniqueSlug($leaveType->name);
        });
        static::updating(function($leaveType){
            if($leaveType->isDirty('name')){
                $leaveType->slug = self::createUniqueSlug($leaveType->name);
            }
        });
    }

    private static function createUniqueSlug($name){
        $slug = Str::slug($name);
        $count = static::where('slug', 'LIKE', "%$slug%")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }
}
