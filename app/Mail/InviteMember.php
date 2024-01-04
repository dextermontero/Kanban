<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InviteMember extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $inviterName;
    private $projectName;
    private $firstname;
    private $lastname;
    private $email;
    private $token;
    
    public function __construct($inviter, $projectName, $firstname, $lastname, $email, $token)
    {
        $this->inviterName = ucwords($inviter);
        $this->projectName = ucwords($projectName);
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->token = $token;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: 'no-reply@kanbanproject.com',
            to: $this->email,
            subject: 'Invite Project',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.invite',
            with: ['inviter' => $this->inviterName, 'projectName' => $this->projectName, 'firstname' => $this->firstname, 'lastname' => $this->lastname, 'token' => $this->token]
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
}
