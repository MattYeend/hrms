<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Mail\Events\MessageSent;
use App\Models\EmailLogs;

class LogSentEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MessageSent $event): void
    {
        $message = $event->message;

        $emails = $message->getTo();
        $subject = $message->getSubject();
        foreach($emails as $email => $name){
            EmailLogs::create([
                'recipient_email' => $email,
                'subject' => $subject,
                'sent_at' => NOW()
            ]);
        }
    }
}
