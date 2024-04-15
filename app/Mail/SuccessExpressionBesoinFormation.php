<?php

namespace App\Mail;

use App\Models\ExpressionBesoinFormation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SuccessExpressionBesoinFormation extends Mailable
{
    use Queueable, SerializesModels;

    public $expression_besoin;

    /**
     * Create a new message instance.
     */
    public function __construct(ExpressionBesoinFormation $expression_besoin)
    {
        
        $this->expression_besoin = $expression_besoin;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Succès de l\'expression de besoin de formation N° '. $this->expression_besoin->numero_commande,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.commande_formation.success_expression_besoin_formation',
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
