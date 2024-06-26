<?php

namespace App\Mail;

use App\Models\ExpressionBesoinFormation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AnnulationPaiementExpressionBesoinFormation extends Mailable
{
    use Queueable, SerializesModels;

    public $expression_besoin_paiement_annulee;

    /**
     * Create a new message instance.
     */
    public function __construct(ExpressionBesoinFormation $expression_besoin_paiement_annulee)
    {
        
        $this->expression_besoin_paiement_annulee = $expression_besoin_paiement_annulee;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Paiement expression du besoin de formation N° '. $this->expression_besoin_paiement_annulee->numero_commande .' '. 'refusé',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.commande_formation.annulation_paiement_expression_besoin',
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
