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

    const ACTION_LEARNING_ASSIGNED = 105;
    const ACTION_LEARNING_STARTED = 106;
    const ACTION_LEARNING_FINISHED = 107;
    const ACTION_LEARNING_ASSIGNED_EMAIL = 108;
    const ACTION_LEARNING_FINISHED_EMAIL = 109;

    const ACTION_CREATE_BLOG = 110;
    const ACTION_UPDATE_BLOG = 111;
    const ACTION_DELETE_BLOG = 112;
    const ACTION_SH0W_BLOG = 113;

    const ACTION_CREATE_BLOG_CATEGORIES = 114;
    const ACTION_UPDATE_BLOG_CATEGORIES = 115;
    const ACTION_DELETE_BLOG_CATEGORIES = 116;
    const ACTION_SH0W_BLOG_CATEGORIES = 117;

    const ACTION_BLOG_LIKE = 118;
    const ACTION_BLOG_COMMENT = 119;

    const ACTION_CREATE_LICENCE = 120;
    const ACTION_UPDATE_LICENCE = 121;
    const ACTION_DELETE_LICENCE = 122;
    const ACTION_SHOW_LICENCE = 123;
    const ACTION_COMPANY_LICENCE_CHANGE = 124;

    const ACTION_CREATE_MEETING = 125;
    const ACTION_UPDATE_MEETING = 126;
    const ACTION_DELETE_MEETING = 127;
    const ACTION_SHOW_MEETING = 128;

    const ACTION_MEETING_MEETING_TYPE_CHANGE = 129;

    const ACTION_CREATE_MEETING_TYPE = 130;
    const ACTION_UPDATE_MEETING_TYPE = 131;
    const ACTION_DELETE_MEETING_TYPE = 132;
    const ACTION_SHOW_MEETING_TYPE = 133;

    const ACTION_CREATE_LOCATION = 134;
    const ACTION_UPDATE_LOCATION = 135;
    const ACTION_DELETE_LOCATION = 136;
    const ACTION_SHOW_LOCATION = 137;
    
    const ACTION_CHANGE_MEETING_LOCATION = 138;
    const ACTION_CHANGE_MEETING_VIRTUAL_TO_PERSON = 139;
    const ACTION_CHANGE_MEETING_PERSON_TO_VIRTUAL = 140;

    const ACTION_PROFILE_PICTURE_UPLOAD = 141;
    const ACTION_PROFILE_PICTURE_CHANGE = 142;
    const ACTION_CV_UPLOAD = 143;
    const ACTION_CV_CHANGE = 144;
    const ACTION_COVER_LETTER_UPLOAD = 145;
    const ACTION_COVER_LETTER_CHANGE = 146;

    const ACTION_USER_JOB_CHANGE = 147;
    const ACTION_USER_ROLE_CHANGE = 148;
    const ACTION_USER_PROMOTION = 149;
    const ACTION_USER_DEMOTION = 150;
    const ACTION_USER_CHANGE_OF_ADDRESS = 151;
    const ACTION_USER_REMOTE_TO_OFFICE = 152;
    const ACTION_USER_OFFICE_TO_REMOTE = 153;
    const ACTION_USER_REMOTE_TO_HYBRID = 154;
    const ACTION_USER_HYBRID_TO_REMOTE = 155;
    const ACTION_USER_OFFICE_TO_HYBRID = 156;
    const ACTION_USER_HYBRID_TO_OFFICE = 157;

    const ACTION_COMPANY_RELATIONSHIP_MANAGER_ASSIGNED_TO_COMPANY = 158;
    const ACTION_COMPANY_RELATIONSHIP_MANAGER_CHANGE_COMPANY_TO_COMPANY = 159;
    const ACTION_COMPANY_RELATIONSHIP_MANAGER_REMOVE_FROM_COMPANY = 160;

    // Meeting invite sent to user
    const ACTION_MEETING_INVITE_EMAIL_SENT = 161;
    // Meeting is accepted on frontend
    const ACTION_MEETING_RESPONSE_ATTEND = 162;
    // Meeting is maybe on frontend
    const ACTION_MEETING_RESPONSE_MAYBE = 163;
    // Meeting is declined on frontend
    const ACTION_MEETING_RESPONSE_DECLINE = 164;
    // Meeting invite email responses
    const ACTION_MEETING_INVITE_EMAIL_ACCEPT_RESPONSE = 165;
    const ACTION_MEETING_INVITE_EMAIL_MAYBE_RESPONSE = 166;
    const ACTION_MEETING_INVITE_EMAIL_DECLINE_RESPONSE = 167;
    // Meeting response changes
    const ACTION_INVITE_ATTEND_TO_MAYBE = 168;
    const ACTION_INVITE_ATTEND_TO_DECLINE = 169;
    const ACTION_INVITE_MAYBE_TO_ATTEND = 170;
    const ACTION_INVITE_MAYBE_TO_DECLINE = 171;
    const ACTION_INVITE_DECLINE_TO_ATTEND = 172;
    const ACTION_INVITE_DECLINE_TO_MAYBE = 173;
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
