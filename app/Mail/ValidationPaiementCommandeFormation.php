<?php

namespace App\Mail;

use App\Models\CommandeFormation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ValidationPaiementCommandeFormation extends Mailable
{
    use Queueable, SerializesModels;

    public $commande_validation_paiement;

    /**
     * Create a new message instance.
     */
    public function __construct(CommandeFormation $commande_validation_paiement)
    {
        
        $this->commande_validation_paiement = $commande_validation_paiement;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Paiement de la commande formation N° '.$this->commande_validation_paiement->numero_commande.' validée',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.commande_formation.validation_paiement_formation',
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
