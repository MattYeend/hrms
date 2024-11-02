<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Learning;
use App\Models\User;

class LearningFinishedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $learning;
    public $finishedBy;
    public $totalMarks;

    /**
     * Create a new message instance.
     */
    public function __construct(Learning $learning, $finishedBy, $totalMarks, User $assignee)
    {
        $this->learning = $learning;
        $this->finishedBy = $finishedBy;
        $this->totalMarks = $totalMarks;
        $this->assignee = $assignee;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Learning Finished',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.learning.learning_finished',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build(){
        return $this->view('emails.learning.learning_finished')
            ->subject('L&D Finished')
            ->with([
                'learning' => $this->learning,
                'finishedBy' => $this->finishedBy,
                'totalMarks' => $this->totalMarks,
                'assignee' => $this->assignee,
            ]);
    }
}
