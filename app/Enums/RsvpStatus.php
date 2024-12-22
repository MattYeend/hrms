<?php

namespace App\Enums;

enum RsvpStatus: string{
    case ATTEND = 'attend';
    case MAYBE = 'maybe';
    case DECLINE = 'decline';
    case OUTSTANDING = 'outstanding';
}
