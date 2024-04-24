<?php

namespace App\Mail;

use App\Models\LivraisonPanier;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ValidationPaiementAchatLivraisonPanier extends Mailable
{
    use Queueable, SerializesModels;

    public $paiement_achat_livraison_valide;

    /**
     * Create a new message instance.
     */
    public function __construct(LivraisonPanier $paiement_achat_livraison_valide)
    {
        $this->paiement_achat_livraison_valide = $paiement_achat_livraison_valide;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Paiement de l\'achat et livraion N°'. $this->paiement_achat_livraison_valide->numero_abonnement .' reussi',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.livraison_panier.validation_paiement_achat_livraison',
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
