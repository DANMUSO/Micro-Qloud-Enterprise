<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
class onboarding extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $employer_name;
    /**
     * Create a new message instance.
     */
    public function __construct($name, $employer_name)
    {
        $this->name = $name;
        $this->employer_name = $employer_name;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address("loan@qloudpointsolutions.com", "Micro Qloud Enterprise Ltd"),
            subject: 'New Client - New Onboarding.'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.onboarding',
            with: [
                'name' => $this->name,
                'employer_name' => $this->employer_name,
            ]
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
