<?php

namespace App\Mail;

use App\Models\LivraisonPanier;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SuccessLivraisonPanier extends Mailable
{
    use Queueable, SerializesModels;

    public $success_livraison;

    /**
     * Create a new message instance.
     */
    public function __construct(LivraisonPanier $success_livraison)
    {
        $this->success_livraison = $success_livraison;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Livraison panier N° '. $this->success_livraison->numero_commande .' '. 'validée',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.livraison_panier.success_livraison',
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
