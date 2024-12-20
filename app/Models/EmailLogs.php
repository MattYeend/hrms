<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailLogs extends Model
{
    /** @use HasFactory<\Database\Factories\EmailLogsFactory> */
    use HasFactory;

    protected $fillable = [
        'recipient_email',
        'subject',
        'sent_at'
    ];
}
