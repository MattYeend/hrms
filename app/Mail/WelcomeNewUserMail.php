<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\URL;

class WelcomeNewUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $password;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, $password)
    {
        $this->user = $user;
        $this->password = $password;

        $token = Password::createToken($user);
        $this->resetPasswordLink = URL::route('password.reset', ['token' => $token, 'email' =>$user->email]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.user.welcome_user',
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
        return $this->view('emails.user.welcome_user')
                    ->with([
                        'resetPasswordLink' => $this->resetPasswordLink,
                    ])
                    ->subject('Welcome to our platform');
    }
}
