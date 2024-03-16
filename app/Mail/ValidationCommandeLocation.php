<?php

namespace App\Mail;

use App\Models\CommandeLocation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ValidationCommandeLocation extends Mailable
{
    use Queueable, SerializesModels;

    public $commande_validation;

    /**
     * Create a new message instance.
     */
    public function __construct(CommandeLocation $commande_validation)
    {
        $this->commande_validation = $commande_validation;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Commande de location N° '. $this->commande_validation->numero_commande .' '. 'validée',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.commande_location.validation_commande_location',
            with: [
                'url' => 'http://127.0.0.1:8000/myprofile/confirmation-paiement',
            ],
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
