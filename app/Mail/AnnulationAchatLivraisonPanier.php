<?php

namespace App\Mail;

use App\Models\LivraisonPanier;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AnnulationAchatLivraisonPanier extends Mailable
{
    use Queueable, SerializesModels;

    public $achat_livraison_annulee;

    /**
     * Create a new message instance.
     */
    public function __construct(LivraisonPanier $achat_livraison_annulee)
    {
        $this->achat_livraison_annulee = $achat_livraison_annulee;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Achat et livraison panier N° '. $this->achat_livraison_annulee->numero_commande .' '. 'annulée',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.livraison_panier.annulation_achat_livraison',
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
