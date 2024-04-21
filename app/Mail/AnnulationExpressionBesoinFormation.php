<?php

namespace App\Mail;

use App\Models\ExpressionBesoinFormation;
use App\Models\Marque;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Markdown;
use Illuminate\Queue\SerializesModels;

class AnnulationExpressionBesoinFormation extends Mailable
{
    use Queueable, SerializesModels;

    public $expression_besoin_annulee;

    /**
     * Create a new message instance.
     */
    public function __construct(ExpressionBesoinFormation $expression_besoin_annulee)
    {
        
        $this->expression_besoin_annulee = $expression_besoin_annulee;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Expression du besoin de formation N° '. $this->expression_besoin_annulee->numero_commande .' '. 'annulée',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.commande_formation.annulation_expression_besoin',
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
