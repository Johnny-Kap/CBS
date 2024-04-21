<?php

namespace App\Mail;

use App\Models\SouscrireAbonnement;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AnnulationPaiementAbonnement extends Mailable
{
    use Queueable, SerializesModels;

    public $paiement_abonnement_annule;

    /**
     * Create a new message instance.
     */
    public function __construct(SouscrireAbonnement $paiement_abonnement_annule)
    {
        $this->paiement_abonnement_annule = $paiement_abonnement_annule;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Paiement de l\'abonnement '. $this->paiement_abonnement_annule->intitule .' '. 'annulé',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.souscrire_abonnement.annulation_paiement_abonnement',
            with: [
                'url' => 'http://127.0.0.1:8000/myprofile/confirmation-abonnement',
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
