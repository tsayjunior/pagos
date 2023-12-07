<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class sendCorreo extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    private $asunto = '';
    public $img = ''; 
    public function __construct($data)
    {
        $this->asunto = $data->asunto;
        $this->img = $data->img;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->asunto !== ''? $this->asunto : 'Send Correo',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    { 
        return new Content(
            view: 'mails.send-correo-pago',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
        Attachment::fromData(fn () => $this->img, 'qr.png')
                ->withMime('application/png'),
        ];
    }
}
