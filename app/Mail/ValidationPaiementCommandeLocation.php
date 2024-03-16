<?php

namespace App\Mail;

use App\Models\CommandeLocation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ValidationPaiementCommandeLocation extends Mailable
{
    use Queueable, SerializesModels;

    public $commande_validation_paiement;

    /**
     * Create a new message instance.
     */
    public function __construct(CommandeLocation $commande_validation_paiement)
    {
        $this->commande_validation_paiement = $commande_validation_paiement;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Paiement de la commande N° '.$this->commande_validation_paiement->numero_commande.' validée',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.commande_location.validation_paiement_location',
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
