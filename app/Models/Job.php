<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'expectations',
        'probation_length',
        'salary_range_id',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'deleted_by',
        'deleted_at'
    ];

    protected static function boot(){
        parent::boot();
        static::saving(function($job){
            if(empty($job->slug)){
                $job->slug = Str::slug($job->name);
                $originalSlug = $job->slug;
                $counter = 1;
                while(static::whereSlug($job->slug)->exists()){
                    $job->slug = $originalSlug . '-' . $counter++;
                }
            }
        });
    }

    public function salaryRange(){
        return $this->hasOne(SalaryRange::class, 'salary_range_id');
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
