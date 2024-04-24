<?php

namespace App\Mail;

use App\Models\CommandeFormation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AnnulationPaiementCommandeFormation extends Mailable
{
    use Queueable, SerializesModels;

    public $paiement_formation_annule;

    /**
     * Create a new message instance.
     */
    public function __construct(CommandeFormation $paiement_formation_annule)
    {
        
        $this->paiement_formation_annule = $paiement_formation_annule;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Paiement commande formation N° '. $this->paiement_formation_annule->numero_commande .' '. 'refusé',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.commande_formation.annulation_paiement_formation',
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
