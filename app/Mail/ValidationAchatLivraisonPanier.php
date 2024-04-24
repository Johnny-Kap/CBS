<?php

namespace App\Mail;

use App\Models\LivraisonPanier;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ValidationAchatLivraisonPanier extends Mailable
{
    use Queueable, SerializesModels;

    public $validation_achat_livraison;

    /**
     * Create a new message instance.
     */
    public function __construct(LivraisonPanier $validation_achat_livraison)
    {
        $this->validation_achat_livraison = $validation_achat_livraison;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Commande d\'achat et livraison panier N° '. $this->validation_achat_livraison->numero_commande .' '. 'validée',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.livraison_panier.validation_achat_livraison',
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
