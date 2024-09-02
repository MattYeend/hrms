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
        static::saving(function($role){
            if(empty($role->slug)){
                $role->slug = Str::slug($role->name);
                $originalSlug = $role->slug;
                $counter = 1;
                while(static::whereSlug($role->slug)->exists()){
                    $role->slug = $originalSlug . '-' . $counter++;
                }
            }
        });
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
