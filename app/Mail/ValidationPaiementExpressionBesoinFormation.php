<?php

namespace App\Mail;

use App\Models\ExpressionBesoinFormation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ValidationPaiementExpressionBesoinFormation extends Mailable
{
    use Queueable, SerializesModels;

    public $validation_paiement_expression_besoin;

    /**
     * Create a new message instance.
     */
    public function __construct(ExpressionBesoinFormation $validation_paiement_expression_besoin)
    {
        
        $this->validation_paiement_expression_besoin = $validation_paiement_expression_besoin;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Paiement de l\'expression du besoin de formation location N° '.$this->validation_paiement_expression_besoin->numero_commande.' validée',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.commande_formation.validation_paiement_expression_besoin',
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
