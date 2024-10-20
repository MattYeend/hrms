<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\RsvpStatus;

class UserMeetings extends Model
{
    use HasFactory;

    protected $table = 'user_meetings';

    protected $fillable = [
        'user_id',
        'meeting_id',
        'rsvp_status'
    ];

    protected $casts = [
        'rsvp_status' => RsvpStatus::class,
    ];
}
