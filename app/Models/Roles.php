<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Roles extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'deleted_by',
        'deleted_at'
    ];

    protected static function boot(){
        parent::boot();
        static::creating(function($role){
            $role->slug = self::createUniqueSlug($role->name);
        });
        static::updating(function($role){
            if($role->isDirty('name')){
                $role->slug = self::createUniqueSlug($role->name);
            }
        });
    }

    private static function createUniqueSlug($name){
        $slug = Str::slug($name);
        $count = static::where('slug', 'LIKE', "%$slug%")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy(){
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
