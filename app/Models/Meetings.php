<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meetings extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'in_person',
        'is_virtual',
        'scheduled_at',
        'location_id',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by'
    ];

    public function location(){
        return $this->belongsTo(Locations::class);
    }

    public function meetingType(){
        return $this->belongsTo(MeetingType::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
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