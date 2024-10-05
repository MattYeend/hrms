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
    const ACTION_WELCOME_EMAIL_SENT = 6;
    const ACTION_CONFIRM_PASSWORD = 7;
    const ACTION_FORGOT_PASSWORD = 8;
    const ACTION_USER_REGISTER = 9;
    const ACTION_RESET_PASSWORD = 10;
    const ACTION_USER_VERIFICATION = 11;
    const ACTION_CREATE_USER_CONTACTS = 12;
    const ACTION_UPDATE_USER_CONTACTS = 13;
    const ACTION_DELETE_USER_CONTACTS = 14;
    const ACTION_CREATE_USER_CONTACT_RELATIONS = 15;
    const ACTION_UPDATE_USER_CONTACT_RELATIONS = 16;
    const ACTION_DELETE_USER_CONTACT_RELATIONS = 17;
    const ACTION_CREATE_DEPARTMENT = 18;
    const ACTION_UPDATE_DEPARTMENT = 19;
    const ACTION_DELETE_DEPARTMENT = 20;
    const ACTION_CREATE_ROLE = 21;
    const ACTION_UPDATE_ROLE = 22;
    const ACTION_DELETE_ROLE = 23;
    const ACTION_CREATE_HOLIDAY = 24;
    const ACTION_UPDATE_HOLIDAY = 25;
    const ACTION_DELETE_HOLIDAY = 26;
    const ACTION_HOLIDAY_APPROVE = 27;
    const ACTION_HOLIDAY_DENY = 28;
    const ACTION_HOLIDAY_CREATE_EMAIL_SENT = 29;
    const ACTION_HOLIDAY_APPROVE_EMAIL_SENT = 30;
    const ACTION_HOLIDAY_DENY_EMAIL_SENT = 31;
    const ACTION_CREATE_JOB = 32;
    const ACTION_UPDATE_JOB = 33;
    const ACTION_DELETE_JOB = 34;
    const ACTION_CREATE_SALARY_RANGE = 35;
    const ACTION_UPDATE_SALARY_RANGE = 36;
    const ACTION_DELETE_SALARY_RANGE = 37;
    const ACTION_CREATE_SENIORITY = 38;
    const ACTION_UPDATE_SENIORITY = 39;
    const ACTION_DELETE_SENIORITY = 40;
    const ACTION_CREATE_ACHIEVEMENTS = 41;
    const ACTION_UPDATE_ACHIEVEMENTS = 42;
    const ACTION_DELETE_ACHIEVEMENTS = 43;
    const ACTION_CREATE_COMPANY = 44;
    const ACTION_UPDATE_COMPANY = 45;
    const ACTION_DELETE_COMPANY = 46;
    const ACTION_CREATE_COMPANY_CONTACTS = 47;
    const ACTION_UPDATE_COMPANY_CONTACTS = 48;
    const ACTION_DELETE_COMPANY_CONTACTS = 49;
    const ACTION_CREATE_NOTE = 50;
    const ACTION_UPDATE_NOTE = 51;
    const ACTION_DELETE_NOTE = 52;
    const ACTION_CREATE_NOTE_TYPE = 53;
    const ACTION_UPDATE_NOTE_TYPE = 54;
    const ACTION_DELETE_NOTE_TYPE = 55;
    const ACTION_CREATE_LANGUAGE = 56;
    const ACTION_UPDATE_LANGUAGE = 57;
    const ACTION_DELETE_LANGUAGE = 58;
    const ACTION_CREATE_LEARNING = 59;
    const ACTION_UPDATE_LEARNING = 60;
    const ACTION_DELETE_LEARNING = 61;
    const ACTION_CREATE_LEARNING_MARKS = 62;
    const ACTION_UPDATE_LEARNING_MARKS = 63;
    const ACTION_DELETE_LEARNING_MARKS = 64;
    const ACTION_CREATE_LEARNING_DIFFICULTY = 65;
    const ACTION_UPDATE_LEARNING_DIFFICULTY = 66;
    const ACTION_DELETE_LEARNING_DIFFICULTY = 67;
    const ACTION_CREATE_LEARNING_TIME = 68;
    const ACTION_UPDATE_LEARNING_TIME = 69;
    const ACTION_DELETE_LEARNING_TIME = 70;
    const ACTION_CREATE_LEARNING_CATEGORY = 71;
    const ACTION_UPDATE_LEARNING_CATEGORY = 72;
    const ACTION_DELETE_LEARNING_CATEGORY = 73;
    const ACTION_CREATE_LEARNING_PROVIDER = 74;
    const ACTION_UPDATE_LEARNING_PROVIDER = 75;
    const ACTION_DELETE_LEARNING_PROVIDER = 76;
    const ACTION_CREATE_LEARNING_PROVIDER_CONTACT = 77;
    const ACTION_UPDATE_LEARNING_PROVIDER_CONTACT = 78;
    const ACTION_DELETE_LEARNING_PROVIDER_CONTACT = 79;
    const ACTION_CREATE_BLOG = 80;
    const ACTION_UPDATE_BLOG = 81;
    const ACTION_DELETE_BLOG = 82;
    const ACTION_CREATE_BLOG_CATEGORIES = 83;
    const ACTION_UPDATE_BLOG_CATEGORIES = 84;
    const ACTION_DELETE_BLOG_CATEGORIES = 85;
    const ACTION_BLOG_LIKE = 86;
    const ACTION_BLOG_COMMENT = 87;


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
