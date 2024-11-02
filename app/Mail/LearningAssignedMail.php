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

class LearningAssignedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $learning;
    public $assignedBy;

    /**
     * Create a new message instance.
     */
    public function __construct(Learning $learning, $assignedBy, User $assignee)
    {
        $this->learning = $learning;
        $this->assignedBy = $assignedBy;
        $this->assignee = $assignee;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Learning Assigned',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.learning.learning_assigned',
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
        return $this->view('emails.learning.learning_assigned')
            ->subject('New L&D Assigned')
            ->with([
                'learning' => $this->learning,
                'assignedBy' => $this->assignedBy,
                'assignee' => $this->assignee,
            ]);
    }
}
