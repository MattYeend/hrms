<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logger extends Model
{
    use HasFactory;

    protected $fillable = [
        'logged_in_user_id',
        'related_to_user_id',
        'action',
        'data',
        'created_at',
        'updated_at'
    ];

    public function loggedInUser(){
        return $this->belongsTo(User::class, 'logged_in_user_id');
    }

    public function relatedToUser(){
        return $this->belongsTo(User::class, 'related_to_user_id');
    }

    const ACTION_LOGIN = 1;
    const ACTION_LOGOUT = 2;
    const ACTION_CREATE_USER = 3;
    const ACTION_UPDATE_USER = 4;
    const ACTION_DELETE_USER = 5;
    const ACTION_CREATE_DEPARTMENT = 6;
    const ACTION_UPDATE_DEPARTMENT = 7;
    const ACTION_DELETE_DEPARTMENT = 8;
    const ACTION_CREATE_ROLE = 9;
    const ACTION_UPDATE_ROLE = 10;
    const ACTION_DELETE_ROLE = 11;
    const ACTION_CREATE_HOLIDAY = 12;
    const ACTION_UPDATE_HOLIDAY = 13;
    const ACTION_DELETE_HOLIDAY = 14;
    const ACTION_CREATE_JOB = 15;
    const ACTION_UPDATE_JOB = 16;
    const ACTION_DELETE_JOB = 17;
}
