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

    const ACTION_PROFILE_PICTURE_UPLOAD = 16;
    const ACTION_PROFILE_PICTURE_CHANGE = 17;
    const ACTION_CV_UPLOAD = 18;
    const ACTION_CV_CHANGE = 19;
    const ACTION_COVER_LETTER_UPLOAD = 20;
    const ACTION_COVER_LETTER_CHANGE = 21;

    // User contact
    const ACTION_CREATE_USER_CONTACTS = 22;
    const ACTION_UPDATE_USER_CONTACTS = 23;
    const ACTION_DELETE_USER_CONTACTS = 24;
    const ACTION_SHOW_USER_CONTACTS = 25;

    const ACTION_CREATE_USER_CONTACT_RELATIONS = 26;
    const ACTION_UPDATE_USER_CONTACT_RELATIONS = 27;
    const ACTION_DELETE_USER_CONTACT_RELATIONS = 28;
    const ACTION_SHOW_USER_CONTACT_RELATIONS = 29;

    // Department
    const ACTION_CREATE_DEPARTMENT = 30;
    const ACTION_UPDATE_DEPARTMENT = 31;
    const ACTION_DELETE_DEPARTMENT = 32;
    const ACTION_SHOW_DEPARTMENT = 33;

    // Roles
    const ACTION_CREATE_ROLE = 34;
    const ACTION_UPDATE_ROLE = 35;
    const ACTION_DELETE_ROLE = 36;
    const ACTION_SHOW_ROLE = 37;

    // Holiday entitlement
    const ACTION_CREATE_HOLIDAY = 38;
    const ACTION_UPDATE_HOLIDAY = 39;
    const ACTION_DELETE_HOLIDAY = 40;
    const ACTION_SHOW_HOLIDAY = 41;
    const ACTION_HOLIDAY_APPROVE = 42;
    const ACTION_HOLIDAY_DENY = 43;
    const ACTION_HOLIDAY_CREATE_EMAIL_SENT = 44;
    const ACTION_HOLIDAY_UPDATE_EMAIL_SENT = 45;
    const ACTION_HOLIDAY_APPROVE_EMAIL_SENT = 46;
    const ACTION_HOLIDAY_DENY_EMAIL_SENT = 47;

    // Job
    const ACTION_CREATE_JOB = 48;
    const ACTION_UPDATE_JOB = 49;
    const ACTION_DELETE_JOB = 50;
    const ACTION_SHOW_JOB = 51;

    const ACTION_USER_JOB_CHANGE = 52;
    const ACTION_USER_ROLE_CHANGE = 53;
    const ACTION_USER_PROMOTION = 54;
    const ACTION_USER_DEMOTION = 55;
    const ACTION_USER_CHANGE_OF_ADDRESS = 56;
    const ACTION_USER_REMOTE_TO_OFFICE = 57;
    const ACTION_USER_OFFICE_TO_REMOTE = 58;
    const ACTION_USER_REMOTE_TO_HYBRID = 59;
    const ACTION_USER_HYBRID_TO_REMOTE = 60;
    const ACTION_USER_OFFICE_TO_HYBRID = 61;
    const ACTION_USER_HYBRID_TO_OFFICE = 62;

    // Salary
    const ACTION_CREATE_SALARY_RANGE = 63;
    const ACTION_UPDATE_SALARY_RANGE = 64;
    const ACTION_DELETE_SALARY_RANGE = 65;
    const ACTION_SHOW_SALARY_RANGE = 66;

    // Seniority
    const ACTION_CREATE_SENIORITY = 67;
    const ACTION_UPDATE_SENIORITY = 68;
    const ACTION_DELETE_SENIORITY = 69;
    const ACTION_SHOW_SENIORITY = 70;

    // Achievements
    const ACTION_CREATE_ACHIEVEMENTS = 71;
    const ACTION_UPDATE_ACHIEVEMENTS = 72;
    const ACTION_DELETE_ACHIEVEMENTS = 73;
    const ACTION_SHOW_ACHIEVEMENT = 74;

    // Company
    const ACTION_CREATE_COMPANY = 75;
    const ACTION_UPDATE_COMPANY = 76;
    const ACTION_DELETE_COMPANY = 77;
    const ACTION_SHOW_COMPANY = 78;


    // Company contact
    const ACTION_CREATE_COMPANY_CONTACTS = 79;
    const ACTION_UPDATE_COMPANY_CONTACTS = 80;
    const ACTION_DELETE_COMPANY_CONTACTS = 81;
    const ACTION_SHOW_COMPANY_CONTACTS = 82;

    const ACTION_COMPANY_RELATIONSHIP_MANAGER_ASSIGNED_TO_COMPANY = 83;
    const ACTION_COMPANY_RELATIONSHIP_MANAGER_CHANGE_COMPANY_TO_COMPANY = 84;
    const ACTION_COMPANY_RELATIONSHIP_MANAGER_REMOVE_FROM_COMPANY = 85;

    // Notes
    const ACTION_CREATE_NOTE = 86;
    const ACTION_UPDATE_NOTE = 87;
    const ACTION_DELETE_NOTE = 88;
    const ACTION_SHOW_NOTE = 89;

    // Note types
    const ACTION_CREATE_NOTE_TYPE = 90;
    const ACTION_UPDATE_NOTE_TYPE = 91;
    const ACTION_DELETE_NOTE_TYPE = 92;
    const ACTION_SHOW_NOTE_TYPE = 93;

    // Language
    const ACTION_CREATE_LANGUAGE = 94;
    const ACTION_UPDATE_LANGUAGE = 95;
    const ACTION_DELETE_LANGUAGE = 96;
    const ACTION_SHOW_LANGUAGE = 97;
    
    // Learning
    const ACTION_CREATE_LEARNING = 98;
    const ACTION_UPDATE_LEARNING = 99;
    const ACTION_DELETE_LEARNING = 100;
    const ACTION_SHOW_LEARNING = 101;

    // Learning marks
    const ACTION_CREATE_LEARNING_MARKS = 102;
    const ACTION_UPDATE_LEARNING_MARKS = 103;
    const ACTION_DELETE_LEARNING_MARKS = 104;
    const ACTION_SHOW_LEARNING_MARKS = 105;

    // Learning difficulty
    const ACTION_CREATE_LEARNING_DIFFICULTY = 106;
    const ACTION_UPDATE_LEARNING_DIFFICULTY = 107;
    const ACTION_DELETE_LEARNING_DIFFICULTY = 108;
    const ACTION_SHOW_LEARNING_DIFFICULTY = 109;

    // Learning times
    const ACTION_CREATE_LEARNING_TIME = 110;
    const ACTION_UPDATE_LEARNING_TIME = 111;
    const ACTION_DELETE_LEARNING_TIME = 112;
    const ACTION_SHOW_LEARNING_TIME = 113;

    // Learning category
    const ACTION_CREATE_LEARNING_CATEGORY = 114;
    const ACTION_UPDATE_LEARNING_CATEGORY = 115;
    const ACTION_DELETE_LEARNING_CATEGORY = 116;
    const ACTION_SHOW_LEARNING_CATEGORY = 117;

    // Learning provider
    const ACTION_CREATE_LEARNING_PROVIDER = 118;
    const ACTION_UPDATE_LEARNING_PROVIDER = 119;
    const ACTION_DELETE_LEARNING_PROVIDER = 120;
    const ACTION_SHOW_LEARNING_PROVIDER = 121;

    // Learning provider contact
    const ACTION_CREATE_LEARNING_PROVIDER_CONTACT = 122;
    const ACTION_UPDATE_LEARNING_PROVIDER_CONTACT = 123;
    const ACTION_DELETE_LEARNING_PROVIDER_CONTACT = 124;
    const ACTION_SHOW_LEARNING_PROVIDER_CONTACT = 125;

    // Learning start and end
    const ACTION_LEARNING_ASSIGNED = 126;
    const ACTION_LEARNING_STARTED = 127;
    const ACTION_LEARNING_FINISHED = 128;
    const ACTION_LEARNING_ASSIGNED_EMAIL = 129;
    const ACTION_LEARNING_FINISHED_EMAIL = 130;

    // Blogs
    const ACTION_CREATE_BLOG = 131;
    const ACTION_UPDATE_BLOG = 132;
    const ACTION_DELETE_BLOG = 133;
    const ACTION_SH0W_BLOG = 134;

    // Blog category
    const ACTION_CREATE_BLOG_CATEGORIES = 135;
    const ACTION_UPDATE_BLOG_CATEGORIES = 136;
    const ACTION_DELETE_BLOG_CATEGORIES = 137;
    const ACTION_SH0W_BLOG_CATEGORIES = 138;

    // Blog interactions
    const ACTION_BLOG_LIKE = 139;
    const ACTION_BLOG_COMMENT = 140;

    // Licences 
    const ACTION_CREATE_LICENCE = 141;
    const ACTION_UPDATE_LICENCE = 142;
    const ACTION_DELETE_LICENCE = 143;
    const ACTION_SHOW_LICENCE = 144;
    const ACTION_COMPANY_LICENCE_CHANGE = 145;

    // Meetings
    const ACTION_CREATE_MEETING = 146;
    const ACTION_UPDATE_MEETING = 147;
    const ACTION_DELETE_MEETING = 148;
    const ACTION_SHOW_MEETING = 149;

    // Meeting types
    const ACTION_MEETING_MEETING_TYPE_CHANGE = 150;
    const ACTION_CREATE_MEETING_TYPE = 151;
    const ACTION_UPDATE_MEETING_TYPE = 152;
    const ACTION_DELETE_MEETING_TYPE = 153;
    const ACTION_SHOW_MEETING_TYPE = 154;

    // Meeting locations
    const ACTION_CHANGE_MEETING_LOCATION = 155;
    const ACTION_CHANGE_MEETING_VIRTUAL_TO_PERSON = 156;
    const ACTION_CHANGE_MEETING_PERSON_TO_VIRTUAL = 157;

    // Locations
    const ACTION_CREATE_LOCATION = 158;
    const ACTION_UPDATE_LOCATION = 159;
    const ACTION_DELETE_LOCATION = 160;
    const ACTION_SHOW_LOCATION = 161;

    // Meeting invite sent to user
    const ACTION_MEETING_INVITE_EMAIL_SENT = 162;
    // Meeting response frontend
    const ACTION_MEETING_RESPONSE_ATTEND = 163;
    const ACTION_MEETING_RESPONSE_MAYBE = 164;
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

    // Throttling
    const ACTION_THROTTLING_LOGIN_ATTEMPTS = 175;
    const ACTION_THROTTLING_PASSWORD_RESET = 176;
    const ACTION_THROTTLING_REGISTER = 177;

    // Notifications
    const ACTION_NOTIFICATION_NEW = 178;
    const ACTION_NOTIFICATION_READ = 179;
    const ACTION_NOTIFICATION_IGNORE = 180;

    // Rotas
    const ACTION_CREATE_ROTA = 181;
    const ACTION_UPDATE_ROTA = 182;
    const ACTION_DELETE_ROTA = 183;
    const ACTION_SHOW_ROTA = 184;

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
