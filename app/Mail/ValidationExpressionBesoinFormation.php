<?php

namespace App\Mail;

use App\Models\ExpressionBesoinFormation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ValidationExpressionBesoinFormation extends Mailable
{
    use Queueable, SerializesModels;

    public $validation_expression_besoin;

    /**
     * Create a new message instance.
     */
    public function __construct(ExpressionBesoinFormation $validation_expression_besoin)
    {
        
        $this->validation_expression_besoin = $validation_expression_besoin;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Expression du besoin de formation N° '. $this->validation_expression_besoin->numero_commande .' '. 'validée',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.commande_formation.validation_expression_besoin',
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
