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
    const ACTION_CREATE_USER_CONTACTS = 6;
    const ACTION_UPDATE_USER_CONTACTS = 7;
    const ACTION_DELETE_USER_CONTACTS = 8;
    const ACTION_CREATE_USER_CONTACT_RELATIONS = 9;
    const ACTION_UPDATE_USER_CONTACT_RELATIONS = 10;
    const ACTION_DELETE_USER_CONTACT_RELATIONS = 11;
    const ACTION_CREATE_DEPARTMENT = 12;
    const ACTION_UPDATE_DEPARTMENT = 13;
    const ACTION_DELETE_DEPARTMENT = 14;
    const ACTION_CREATE_ROLE = 15;
    const ACTION_UPDATE_ROLE = 16;
    const ACTION_DELETE_ROLE = 17;
    const ACTION_CREATE_HOLIDAY = 18;
    const ACTION_UPDATE_HOLIDAY = 19;
    const ACTION_DELETE_HOLIDAY = 20;
    const ACTION_HOLIDAY_APPROVE = 21;
    const ACTION_HOLIDAY_DENY = 22;
    const ACTION_CREATE_JOB = 23;
    const ACTION_UPDATE_JOB = 24;
    const ACTION_DELETE_JOB = 25;
    const ACTION_CREATE_SALARY_RANGE = 26;
    const ACTION_UPDATE_SALARY_RANGE = 27;
    const ACTION_DELETE_SALARY_RANGE = 28;
    const ACTION_CREATE_SENIORITY = 29;
    const ACTION_UPDATE_SENIORITY = 30;
    const ACTION_DELETE_SENIORITY = 31;
    const ACTION_CREATE_ACHIEVEMENTS = 32;
    const ACTION_UPDATE_ACHIEVEMENTS = 33;
    const ACTION_DELETE_ACHIEVEMENTS = 34;
    const ACTION_CREATE_COMPANY = 35;
    const ACTION_UPDATE_COMPANY = 36;
    const ACTION_DELETE_COMPANY = 37;
    const ACTION_CREATE_COMPANY_CONTACTS = 38;
    const ACTION_UPDATE_COMPANY_CONTACTS = 39;
    const ACTION_DELETE_COMPANY_CONTACTS = 40;
    const ACTION_CREATE_NOTE = 41;
    const ACTION_UPDATE_NOTE = 42;
    const ACTION_DELETE_NOTE = 43;
    const ACTION_CREATE_NOTE_TYPE = 44;
    const ACTION_UPDATE_NOTE_TYPE = 45;
    const ACTION_DELETE_NOTE_TYPE = 46;
    const ACTION_CREATE_LANGUAGE = 47;
    const ACTION_UPDATE_LANGUAGE = 48;
    const ACTION_DELETE_LANGUAGE = 49;
    const ACTION_CREATE_LEARNING = 50;
    const ACTION_UPDATE_LEARNING = 51;
    const ACTION_DELETE_LEARNING = 52;
    const ACTION_CREATE_LEARNING_MARKS = 53;
    const ACTION_UPDATE_LEARNING_MARKS = 54;
    const ACTION_DELETE_LEARNING_MARKS = 55;
    const ACTION_CREATE_LEARNING_DIFFICULTY = 56;
    const ACTION_UPDATE_LEARNING_DIFFICULTY = 57;
    const ACTION_DELETE_LEARNING_DIFFICULTY = 58;
    const ACTION_CREATE_LEARNING_TIME = 59;
    const ACTION_UPDATE_LEARNING_TIME = 60;
    const ACTION_DELETE_LEARNING_TIME = 61;
    const ACTION_CREATE_LEARNING_CATEGORY = 62;
    const ACTION_UPDATE_LEARNING_CATEGORY = 63;
    const ACTION_DELETE_LEARNING_CATEGORY = 64;
    const ACTION_CREATE_LEARNING_PROVIDER = 65;
    const ACTION_UPDATE_LEARNING_PROVIDER = 66;
    const ACTION_DELETE_LEARNING_PROVIDER = 67;
    const ACTION_CREATE_LEARNING_PROVIDER_CONTACT = 68;
    const ACTION_UPDATE_LEARNING_PROVIDER_CONTACT = 69;
    const ACTION_DELETE_LEARNING_PROVIDER_CONTACT = 70;

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
