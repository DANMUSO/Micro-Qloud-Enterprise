<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
class ClientCreated extends Mailable
{
    use Queueable, SerializesModels;
    public $client;
    public $password;
    /**
     * Create a new message instance.
     */
    public function __construct($client, $password)
    {
        $this->client = $client;
        $this->password = $password;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address("loan@qloudpointsolutions.com", "Micro Qloud Enterprise Ltd"),
            subject: 'Business Loan - Your account has been created successfully.'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.client_created',
            with: [
                'name' => $this->client->name,
                'email' => $this->client->email,
                'password' => $this->password,
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
