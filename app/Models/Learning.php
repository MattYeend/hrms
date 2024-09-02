<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Learning extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'mark_id',
        'category_id',
        'difficulty_id',
        'time_id',
        'provider_id',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'deleted_by',
        'deleted_at'
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function difficulty(){
        return $this->belongsTo(Difficulty::class, 'difficulty_id');
    }

    public function marks(){
        return $this->belongsTo(Marks::class, 'mark_id');
    }

    public function time(){
        return $this->belongsTo(Time::class, 'time_id');
    }

    public function provider(){
        return $this->belongsTo(Provider::class, 'provider_id');
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
