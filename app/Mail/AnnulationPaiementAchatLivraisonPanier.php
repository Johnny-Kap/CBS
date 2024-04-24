<?php

namespace App\Mail;

use App\Models\LivraisonPanier;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AnnulationPaiementAchatLivraisonPanier extends Mailable
{
    use Queueable, SerializesModels;

    public $paiement_achat_livraison_annule;

    /**
     * Create a new message instance.
     */
    public function __construct(LivraisonPanier $paiement_achat_livraison_annule)
    {
        $this->paiement_achat_livraison_annule = $paiement_achat_livraison_annule;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Paiement commande d\'achat et livraison formation N° '. $this->paiement_achat_livraison_annule->numero_commande .' '. 'refusé',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.livraison_panier.annulation_paiement_achat_livraison',
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
