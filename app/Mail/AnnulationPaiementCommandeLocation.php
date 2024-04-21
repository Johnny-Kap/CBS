<?php

namespace App\Mail;

use App\Models\CommandeLocation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AnnulationPaiementCommandeLocation extends Mailable
{
    use Queueable, SerializesModels;

    public $paiement_commande_location_annule;

    /**
     * Create a new message instance.
     */
    public function __construct(CommandeLocation $paiement_commande_location_annule)
    {
        $this->paiement_commande_location_annule = $paiement_commande_location_annule;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Paiement commande location N° '. $this->paiement_commande_location_annule->numero_commande .' '. 'annulé',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.commande_location.annulation_paiement_location',
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
