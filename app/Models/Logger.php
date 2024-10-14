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
    const ACTION_LANGUAGE_CHANGE_SWITCH = 13;
    const ACTION_DARK_MODE_TOGGLE = 14;
    const ACTION_USER_END_DATE_CHANGE = 15;

    const ACTION_CREATE_USER_CONTACTS = 16;
    const ACTION_UPDATE_USER_CONTACTS = 17;
    const ACTION_DELETE_USER_CONTACTS = 18;
    const ACTION_SHOW_USER_CONTACTS = 19;

    const ACTION_CREATE_USER_CONTACT_RELATIONS = 20;
    const ACTION_UPDATE_USER_CONTACT_RELATIONS = 21;
    const ACTION_DELETE_USER_CONTACT_RELATIONS = 22;
    const ACTION_SHOW_USER_CONTACT_RELATIONS = 23;

    const ACTION_CREATE_DEPARTMENT = 24;
    const ACTION_UPDATE_DEPARTMENT = 25;
    const ACTION_DELETE_DEPARTMENT = 26;
    const ACTION_SHOW_DEPARTMENT = 27;

    const ACTION_CREATE_ROLE = 28;
    const ACTION_UPDATE_ROLE = 29;
    const ACTION_DELETE_ROLE = 30;
    const ACTION_SHOW_ROLE = 31;

    const ACTION_CREATE_HOLIDAY = 32;
    const ACTION_UPDATE_HOLIDAY = 33;
    const ACTION_DELETE_HOLIDAY = 34;
    const ACTION_SHOW_HOLIDAY = 35;
    const ACTION_HOLIDAY_APPROVE = 36;
    const ACTION_HOLIDAY_DENY = 37;
    const ACTION_HOLIDAY_CREATE_EMAIL_SENT = 38;
    const ACTION_HOLIDAY_APPROVE_EMAIL_SENT = 39;
    const ACTION_HOLIDAY_DENY_EMAIL_SENT = 40;

    const ACTION_CREATE_JOB = 41;
    const ACTION_UPDATE_JOB = 42;
    const ACTION_DELETE_JOB = 43;
    const ACTION_SHOW_JOB = 44;

    const ACTION_CREATE_SALARY_RANGE = 45;
    const ACTION_UPDATE_SALARY_RANGE = 46;
    const ACTION_DELETE_SALARY_RANGE = 47;
    const ACTION_SHOW_SALARY_RANGE = 48;

    const ACTION_CREATE_SENIORITY = 49;
    const ACTION_UPDATE_SENIORITY = 50;
    const ACTION_DELETE_SENIORITY = 51;
    const ACTION_SHOW_SENIORITY = 52;

    const ACTION_CREATE_ACHIEVEMENTS = 53;
    const ACTION_UPDATE_ACHIEVEMENTS = 54;
    const ACTION_DELETE_ACHIEVEMENTS = 55;
    const ACTION_SHOW_ACHIEVEMENT = 56;

    const ACTION_CREATE_COMPANY = 57;
    const ACTION_UPDATE_COMPANY = 58;
    const ACTION_DELETE_COMPANY = 59;
    const ACTION_SHOW_COMPANY = 60;

    const ACTION_CREATE_COMPANY_CONTACTS = 61;
    const ACTION_UPDATE_COMPANY_CONTACTS = 62;
    const ACTION_DELETE_COMPANY_CONTACTS = 63;
    const ACTION_SHOW_COMPANY_CONTACTS = 64;

    const ACTION_CREATE_NOTE = 65;
    const ACTION_UPDATE_NOTE = 66;
    const ACTION_DELETE_NOTE = 67;
    const ACTION_SHOW_NOTE = 68;

    const ACTION_CREATE_NOTE_TYPE = 69;
    const ACTION_UPDATE_NOTE_TYPE = 70;
    const ACTION_DELETE_NOTE_TYPE = 71;
    const ACTION_SHOW_NOTE_TYPE = 72;

    const ACTION_CREATE_LANGUAGE = 73;
    const ACTION_UPDATE_LANGUAGE = 74;
    const ACTION_DELETE_LANGUAGE = 75;
    const ACTION_SHOW_LANGUAGE = 76;
    
    const ACTION_CREATE_LEARNING = 77;
    const ACTION_UPDATE_LEARNING = 78;
    const ACTION_DELETE_LEARNING = 79;
    const ACTION_SHOW_LEARNING = 80;

    const ACTION_CREATE_LEARNING_MARKS = 81;
    const ACTION_UPDATE_LEARNING_MARKS = 82;
    const ACTION_DELETE_LEARNING_MARKS = 83;
    const ACTION_SHOW_LEARNING_MARKS = 84;

    const ACTION_CREATE_LEARNING_DIFFICULTY = 85;
    const ACTION_UPDATE_LEARNING_DIFFICULTY = 86;
    const ACTION_DELETE_LEARNING_DIFFICULTY = 87;
    const ACTION_SHOW_LEARNING_DIFFICULTY = 88;

    const ACTION_CREATE_LEARNING_TIME = 89;
    const ACTION_UPDATE_LEARNING_TIME = 90;
    const ACTION_DELETE_LEARNING_TIME = 91;
    const ACTION_SHOW_LEARNING_TIME = 92;

    const ACTION_CREATE_LEARNING_CATEGORY = 93;
    const ACTION_UPDATE_LEARNING_CATEGORY = 94;
    const ACTION_DELETE_LEARNING_CATEGORY = 95;
    const ACTION_SHOW_LEARNING_CATEGORY = 96;

    const ACTION_CREATE_LEARNING_PROVIDER = 97;
    const ACTION_UPDATE_LEARNING_PROVIDER = 98;
    const ACTION_DELETE_LEARNING_PROVIDER = 99;
    const ACTION_SHOW_LEARNING_PROVIDER = 100;

    const ACTION_CREATE_LEARNING_PROVIDER_CONTACT = 101;
    const ACTION_UPDATE_LEARNING_PROVIDER_CONTACT = 102;
    const ACTION_DELETE_LEARNING_PROVIDER_CONTACT = 103;
    const ACTION_SHOW_LEARNING_PROVIDER_CONTACT = 104;

    const ACTION_CREATE_BLOG = 105;
    const ACTION_UPDATE_BLOG = 106;
    const ACTION_DELETE_BLOG = 107;
    const ACTION_SH0W_BLOG = 108;

    const ACTION_CREATE_BLOG_CATEGORIES = 109;
    const ACTION_UPDATE_BLOG_CATEGORIES = 110;
    const ACTION_DELETE_BLOG_CATEGORIES = 111;
    const ACTION_SH0W_BLOG_CATEGORIES = 112;

    const ACTION_BLOG_LIKE = 113;
    const ACTION_BLOG_COMMENT = 114;

    const ACTION_CREATE_LICENCE = 115;
    const ACTION_UPDATE_LICENCE = 116;
    const ACTION_DELETE_LICENCE = 117;
    const ACTION_SHOW_LICENCE = 118;

    const ACTION_COMPANY_LICENCE_CHANGE = 119;
    const ACTION_CREATE_MEETING = 120;
    const ACTION_UPDATE_MEETING = 121;
    const ACTION_DELETE_MEETING = 122;
    const ACTION_SHOW_MEETING = 123;

    const ACTION_CREATE_LOCATION = 124;
    const ACTION_UPDATE_LOCATION = 125;
    const ACTION_DELETE_LOCATION = 126;
    const ACTION_SHOW_LOCATION = 127;
    
    const ACTION_CHANGE_MEETING_LOCATION = 128;
    const ACTION_CHANGE_MEETING_VIRTUAL_TO_PERSON = 129;
    const ACTION_CHANGE_MEETING_PERSON_TO_VIRTUAL = 130;
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
