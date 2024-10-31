<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingTypes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected static function boot(){
        parent::boot();
        static::creating(function($meetingType){
            $meetingType->slug = self::createUniqueSlug($meetingType->name);
        });
        static::updating(function($meetingType){
            if($meetingType->isDirty('name')){
                $meetingType->slug = self::createUniqueSlug($meetingType->name);
            }
        });
    }

    private static function createUniqueSlug($name){
        $slug = Str::slug($name);
        $count = static::where('slug', 'LIKE', "%$slug%")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function meeting(){
        return $this->belongsTo(Meetings::class);
    }
}
