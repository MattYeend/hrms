<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public static function log($action = 0, $data = null, $logged_in_user_id = null, $related_to_user_id = null){
        if(isset($action)){
            if(empty($logged_in_user_id)){
                $logged_in_user_id = Auth::user()->id;
            }
            if(in_array(gettype($data), ['array'])){
                $data = json_encode($data);
            }else if(!is_null($data)){
                throw new \InvalidArgumentException("Data must be an array or null.");
            }

            $log = new Logger;
            $log->logged_in_user_id = $logged_in_user_id;
            $log->action = $action;
            $log->related_to_user_id = $related_to_user_id;
            $log->data = $data;
            $log->save();
        }
    }
}
