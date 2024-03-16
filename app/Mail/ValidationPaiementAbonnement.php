<?php

namespace App\Mail;

use App\Models\SouscrireAbonnement;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ValidationPaiementAbonnement extends Mailable
{
    use Queueable, SerializesModels;

    public $validation_paiement_abo;

    /**
     * Create a new message instance.
     */
    public function __construct(SouscrireAbonnement $validation_paiement_abo)
    {
        $this->validation_paiement_abo = $validation_paiement_abo;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Paiement de l\'abonnement N°'. $this->validation_paiement_abo->numero_abonnement .' reussi',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.souscrire_abonnement.validation_paiement',
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
