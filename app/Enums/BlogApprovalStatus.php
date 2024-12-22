<?php

namespace App\Enums;

enum BlogApprovalStatus: string {
    case Pending = 'pending';
    case Approved = 'approved';
    case Denied = 'denied';
}