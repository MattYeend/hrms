<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'company_id',
        'dept_lead_id',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'deleted_by',
        'deleted_at'
    ];

    protected static function boot(){
        parent::boot();
        static::saving(function($department){
            if(empty($department->slug)){
                $department->slug = Str::slug($department->name);
                $originalSlug = $department->slug;
                $counter = 1;
                while(static::whereSlug($department->slug)->exists()){
                    $department->slug = $originalSlug . '-' . $counter++;
                }
            }
        });
    }

    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function departmentLead(){
        return $this->belongsTo(User::class, 'dept_lead_id');
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
