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
    const ACTION_SHOW_USER = 6;
    const ACTION_WELCOME_EMAIL_SENT = 7;
    const ACTION_CONFIRM_PASSWORD = 8;
    const ACTION_FORGOT_PASSWORD = 9;
    const ACTION_USER_REGISTER = 10;
    const ACTION_RESET_PASSWORD = 11;
    const ACTION_USER_VERIFICATION = 12;
    const ACTION_CREATE_USER_CONTACTS = 13;
    const ACTION_UPDATE_USER_CONTACTS = 14;
    const ACTION_DELETE_USER_CONTACTS = 16;
    const ACTION_SHOW_USER_CONTACTS = 17;
    const ACTION_CREATE_USER_CONTACT_RELATIONS = 18;
    const ACTION_UPDATE_USER_CONTACT_RELATIONS = 19;
    const ACTION_DELETE_USER_CONTACT_RELATIONS = 20;
    const ACTION_SHOW_USER_CONTACT_RELATIONS = 21;
    const ACTION_CREATE_DEPARTMENT = 22;
    const ACTION_UPDATE_DEPARTMENT = 23;
    const ACTION_DELETE_DEPARTMENT = 24;
    const ACTION_SHOW_DEPARTMENT = 25;
    const ACTION_CREATE_ROLE = 26;
    const ACTION_UPDATE_ROLE = 27;
    const ACTION_DELETE_ROLE = 28;
    const ACTION_SHOW_ROLE = 29;
    const ACTION_CREATE_HOLIDAY = 30;
    const ACTION_UPDATE_HOLIDAY = 31;
    const ACTION_DELETE_HOLIDAY = 32;
    const ACTION_SHOW_HOLIDAY = 33;
    const ACTION_HOLIDAY_APPROVE = 34;
    const ACTION_HOLIDAY_DENY = 35;
    const ACTION_HOLIDAY_CREATE_EMAIL_SENT = 36;
    const ACTION_HOLIDAY_APPROVE_EMAIL_SENT = 37;
    const ACTION_HOLIDAY_DENY_EMAIL_SENT = 38;
    const ACTION_CREATE_JOB = 39;
    const ACTION_UPDATE_JOB = 40;
    const ACTION_DELETE_JOB = 41;
    const ACTION_SHOW_JOB = 42;
    const ACTION_CREATE_SALARY_RANGE = 43;
    const ACTION_UPDATE_SALARY_RANGE = 44;
    const ACTION_DELETE_SALARY_RANGE = 45;
    const ACTION_SHOW_SALARY_RANGE = 46;
    const ACTION_CREATE_SENIORITY = 47;
    const ACTION_UPDATE_SENIORITY = 48;
    const ACTION_DELETE_SENIORITY = 49;
    const ACTION_SHOW_SENIORITY = 50;
    const ACTION_CREATE_ACHIEVEMENTS = 51;
    const ACTION_UPDATE_ACHIEVEMENTS = 52;
    const ACTION_DELETE_ACHIEVEMENTS = 53;
    const ACTION_SHOW_ACHIEVEMENT = 54;
    const ACTION_CREATE_COMPANY = 55;
    const ACTION_UPDATE_COMPANY = 56;
    const ACTION_DELETE_COMPANY = 57;
    const ACTION_SHOW_COMPANY = 58;
    const ACTION_CREATE_COMPANY_CONTACTS = 59;
    const ACTION_UPDATE_COMPANY_CONTACTS = 60;
    const ACTION_DELETE_COMPANY_CONTACTS = 61;
    const ACTION_SHOW_COMPANY_CONTACTS = 62;
    const ACTION_CREATE_NOTE = 63;
    const ACTION_UPDATE_NOTE = 64;
    const ACTION_DELETE_NOTE = 65;
    const ACTION_SHOW_NOTE = 66;
    const ACTION_CREATE_NOTE_TYPE = 67;
    const ACTION_UPDATE_NOTE_TYPE = 68;
    const ACTION_DELETE_NOTE_TYPE = 69;
    const ACTION_SHOW_NOTE_TYPE = 70;
    const ACTION_CREATE_LANGUAGE = 71;
    const ACTION_UPDATE_LANGUAGE = 72;
    const ACTION_DELETE_LANGUAGE = 73;
    const ACTION_SHOW_LANGUAGE = 74;
    const ACTION_CREATE_LEARNING = 75;
    const ACTION_UPDATE_LEARNING = 76;
    const ACTION_DELETE_LEARNING = 77;
    const ACTION_SHOW_LEARNING = 78;
    const ACTION_CREATE_LEARNING_MARKS = 79;
    const ACTION_UPDATE_LEARNING_MARKS = 80;
    const ACTION_DELETE_LEARNING_MARKS = 81;
    const ACTION_SHOW_LEARNING_MARKS = 82;
    const ACTION_CREATE_LEARNING_DIFFICULTY = 83;
    const ACTION_UPDATE_LEARNING_DIFFICULTY = 84;
    const ACTION_DELETE_LEARNING_DIFFICULTY = 85;
    const ACTION_SHOW_LEARNING_DIFFICULTY = 86;
    const ACTION_CREATE_LEARNING_TIME = 87;
    const ACTION_UPDATE_LEARNING_TIME = 88;
    const ACTION_DELETE_LEARNING_TIME = 89;
    const ACTION_SHOW_LEARNING_TIME = 90;
    const ACTION_CREATE_LEARNING_CATEGORY = 91;
    const ACTION_UPDATE_LEARNING_CATEGORY = 92;
    const ACTION_DELETE_LEARNING_CATEGORY = 93;
    const ACTION_SHOW_LEARNING_CATEGORY = 94;
    const ACTION_CREATE_LEARNING_PROVIDER = 95;
    const ACTION_UPDATE_LEARNING_PROVIDER = 96;
    const ACTION_DELETE_LEARNING_PROVIDER = 97;
    const ACTION_SHOW_LEARNING_PROVIDER = 98;
    const ACTION_CREATE_LEARNING_PROVIDER_CONTACT = 99;
    const ACTION_UPDATE_LEARNING_PROVIDER_CONTACT = 100;
    const ACTION_DELETE_LEARNING_PROVIDER_CONTACT = 101;
    const ACTION_SHOW_LEARNING_PROVIDER_CONTACT = 102;
    const ACTION_CREATE_BLOG = 103;
    const ACTION_UPDATE_BLOG = 104;
    const ACTION_DELETE_BLOG = 105;
    const ACTION_SH0W_BLOG = 106;
    const ACTION_CREATE_BLOG_CATEGORIES = 107;
    const ACTION_UPDATE_BLOG_CATEGORIES = 108;
    const ACTION_DELETE_BLOG_CATEGORIES = 109;
    const ACTION_SH0W_BLOG_CATEGORIES = 106;
    const ACTION_BLOG_LIKE = 107;
    const ACTION_BLOG_COMMENT = 108;
    const ACTION_LANGUAGE_CHANGE_SWITCH = 109;
    const ACTION_DARK_MODE_TOGGLE = 110;
    // Temp constants to go below
    
    // Temp constants to go above
    // Not to be used!!
    const NOT_AN_ACTION = 000;

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
