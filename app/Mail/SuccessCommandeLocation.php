<?php

namespace App\Mail;

use App\Models\CommandeLocation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SuccessCommandeLocation extends Mailable
{
    use Queueable, SerializesModels;

    public $commande_location;

    /**
     * Create a new message instance.
     */
    public function __construct(CommandeLocation $commande_location)
    {
        $this->commande_location = $commande_location;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Succès de la commande de location N° '. $this->commande_location->numero_commande,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.commande_location.success_commande_location',
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
