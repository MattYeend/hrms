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
    const ACTION_HOLIDAY_UPDATE_EMAIL_SENT = 39;
    const ACTION_HOLIDAY_APPROVE_EMAIL_SENT = 40;
    const ACTION_HOLIDAY_DENY_EMAIL_SENT = 41;

    const ACTION_CREATE_JOB = 42;
    const ACTION_UPDATE_JOB = 43;
    const ACTION_DELETE_JOB = 44;
    const ACTION_SHOW_JOB = 45;

    const ACTION_CREATE_SALARY_RANGE = 46;
    const ACTION_UPDATE_SALARY_RANGE = 47;
    const ACTION_DELETE_SALARY_RANGE = 48;
    const ACTION_SHOW_SALARY_RANGE = 49;

    const ACTION_CREATE_SENIORITY = 50;
    const ACTION_UPDATE_SENIORITY = 51;
    const ACTION_DELETE_SENIORITY = 52;
    const ACTION_SHOW_SENIORITY = 53;

    const ACTION_CREATE_ACHIEVEMENTS = 54;
    const ACTION_UPDATE_ACHIEVEMENTS = 55;
    const ACTION_DELETE_ACHIEVEMENTS = 56;
    const ACTION_SHOW_ACHIEVEMENT = 57;

    const ACTION_CREATE_COMPANY = 58;
    const ACTION_UPDATE_COMPANY = 59;
    const ACTION_DELETE_COMPANY = 60;
    const ACTION_SHOW_COMPANY = 61;

    const ACTION_CREATE_COMPANY_CONTACTS = 62;
    const ACTION_UPDATE_COMPANY_CONTACTS = 63;
    const ACTION_DELETE_COMPANY_CONTACTS = 64;
    const ACTION_SHOW_COMPANY_CONTACTS = 65;

    const ACTION_CREATE_NOTE = 66;
    const ACTION_UPDATE_NOTE = 67;
    const ACTION_DELETE_NOTE = 68;
    const ACTION_SHOW_NOTE = 69;

    const ACTION_CREATE_NOTE_TYPE = 70;
    const ACTION_UPDATE_NOTE_TYPE = 71;
    const ACTION_DELETE_NOTE_TYPE = 72;
    const ACTION_SHOW_NOTE_TYPE = 73;

    const ACTION_CREATE_LANGUAGE = 74;
    const ACTION_UPDATE_LANGUAGE = 75;
    const ACTION_DELETE_LANGUAGE = 76;
    const ACTION_SHOW_LANGUAGE = 77;
    
    const ACTION_CREATE_LEARNING = 78;
    const ACTION_UPDATE_LEARNING = 79;
    const ACTION_DELETE_LEARNING = 80;
    const ACTION_SHOW_LEARNING = 81;

    const ACTION_CREATE_LEARNING_MARKS = 82;
    const ACTION_UPDATE_LEARNING_MARKS = 83;
    const ACTION_DELETE_LEARNING_MARKS = 84;
    const ACTION_SHOW_LEARNING_MARKS = 85;

    const ACTION_CREATE_LEARNING_DIFFICULTY = 86;
    const ACTION_UPDATE_LEARNING_DIFFICULTY = 87;
    const ACTION_DELETE_LEARNING_DIFFICULTY = 88;
    const ACTION_SHOW_LEARNING_DIFFICULTY = 89;

    const ACTION_CREATE_LEARNING_TIME = 90;
    const ACTION_UPDATE_LEARNING_TIME = 91;
    const ACTION_DELETE_LEARNING_TIME = 92;
    const ACTION_SHOW_LEARNING_TIME = 93;

    const ACTION_CREATE_LEARNING_CATEGORY = 94;
    const ACTION_UPDATE_LEARNING_CATEGORY = 95;
    const ACTION_DELETE_LEARNING_CATEGORY = 96;
    const ACTION_SHOW_LEARNING_CATEGORY = 97;

    const ACTION_CREATE_LEARNING_PROVIDER = 98;
    const ACTION_UPDATE_LEARNING_PROVIDER = 99;
    const ACTION_DELETE_LEARNING_PROVIDER = 100;
    const ACTION_SHOW_LEARNING_PROVIDER = 101;

    const ACTION_CREATE_LEARNING_PROVIDER_CONTACT = 102;
    const ACTION_UPDATE_LEARNING_PROVIDER_CONTACT = 103;
    const ACTION_DELETE_LEARNING_PROVIDER_CONTACT = 104;
    const ACTION_SHOW_LEARNING_PROVIDER_CONTACT = 105;

    const ACTION_LEARNING_ASSIGNED = 106;
    const ACTION_LEARNING_STARTED = 107;
    const ACTION_LEARNING_FINISHED = 108;
    const ACTION_LEARNING_ASSIGNED_EMAIL = 109;
    const ACTION_LEARNING_FINISHED_EMAIL = 110;

    const ACTION_CREATE_BLOG = 111;
    const ACTION_UPDATE_BLOG = 112;
    const ACTION_DELETE_BLOG = 113;
    const ACTION_SH0W_BLOG = 114;

    const ACTION_CREATE_BLOG_CATEGORIES = 115;
    const ACTION_UPDATE_BLOG_CATEGORIES = 116;
    const ACTION_DELETE_BLOG_CATEGORIES = 117;
    const ACTION_SH0W_BLOG_CATEGORIES = 118;

    const ACTION_BLOG_LIKE = 119;
    const ACTION_BLOG_COMMENT = 120;

    const ACTION_CREATE_LICENCE = 121;
    const ACTION_UPDATE_LICENCE = 122;
    const ACTION_DELETE_LICENCE = 123;
    const ACTION_SHOW_LICENCE = 124;
    const ACTION_COMPANY_LICENCE_CHANGE = 125;

    const ACTION_CREATE_MEETING = 126;
    const ACTION_UPDATE_MEETING = 127;
    const ACTION_DELETE_MEETING = 128;
    const ACTION_SHOW_MEETING = 129;

    const ACTION_MEETING_MEETING_TYPE_CHANGE = 130;

    const ACTION_CREATE_MEETING_TYPE = 131;
    const ACTION_UPDATE_MEETING_TYPE = 132;
    const ACTION_DELETE_MEETING_TYPE = 133;
    const ACTION_SHOW_MEETING_TYPE = 134;

    const ACTION_CREATE_LOCATION = 135;
    const ACTION_UPDATE_LOCATION = 136;
    const ACTION_DELETE_LOCATION = 137;
    const ACTION_SHOW_LOCATION = 138;
    
    const ACTION_CHANGE_MEETING_LOCATION = 139;
    const ACTION_CHANGE_MEETING_VIRTUAL_TO_PERSON = 140;
    const ACTION_CHANGE_MEETING_PERSON_TO_VIRTUAL = 141;

    const ACTION_PROFILE_PICTURE_UPLOAD = 142;
    const ACTION_PROFILE_PICTURE_CHANGE = 143;
    const ACTION_CV_UPLOAD = 144;
    const ACTION_CV_CHANGE = 145;
    const ACTION_COVER_LETTER_UPLOAD = 146;
    const ACTION_COVER_LETTER_CHANGE = 147;

    const ACTION_USER_JOB_CHANGE = 148;
    const ACTION_USER_ROLE_CHANGE = 149;
    const ACTION_USER_PROMOTION = 150;
    const ACTION_USER_DEMOTION = 151;
    const ACTION_USER_CHANGE_OF_ADDRESS = 152;
    const ACTION_USER_REMOTE_TO_OFFICE = 153;
    const ACTION_USER_OFFICE_TO_REMOTE = 154;
    const ACTION_USER_REMOTE_TO_HYBRID = 155;
    const ACTION_USER_HYBRID_TO_REMOTE = 156;
    const ACTION_USER_OFFICE_TO_HYBRID = 157;
    const ACTION_USER_HYBRID_TO_OFFICE = 158;

    const ACTION_COMPANY_RELATIONSHIP_MANAGER_ASSIGNED_TO_COMPANY = 159;
    const ACTION_COMPANY_RELATIONSHIP_MANAGER_CHANGE_COMPANY_TO_COMPANY = 160;
    const ACTION_COMPANY_RELATIONSHIP_MANAGER_REMOVE_FROM_COMPANY = 161;

    // Meeting invite sent to user
    const ACTION_MEETING_INVITE_EMAIL_SENT = 162;
    // Meeting is accepted on frontend
    const ACTION_MEETING_RESPONSE_ATTEND = 163;
    // Meeting is maybe on frontend
    const ACTION_MEETING_RESPONSE_MAYBE = 164;
    // Meeting is declined on frontend
    const ACTION_MEETING_RESPONSE_DECLINE = 165;
    // Meeting invite email responses
    const ACTION_MEETING_INVITE_EMAIL_ACCEPT_RESPONSE = 166;
    const ACTION_MEETING_INVITE_EMAIL_MAYBE_RESPONSE = 167;
    const ACTION_MEETING_INVITE_EMAIL_DECLINE_RESPONSE = 168;
    // Meeting response changes
    const ACTION_INVITE_ATTEND_TO_MAYBE = 169;
    const ACTION_INVITE_ATTEND_TO_DECLINE = 170;
    const ACTION_INVITE_MAYBE_TO_ATTEND = 171;
    const ACTION_INVITE_MAYBE_TO_DECLINE = 172;
    const ACTION_INVITE_DECLINE_TO_ATTEND = 173;
    const ACTION_INVITE_DECLINE_TO_MAYBE = 174;
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
