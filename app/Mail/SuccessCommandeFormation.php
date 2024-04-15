<?php

namespace App\Mail;

use App\Models\CommandeFormation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SuccessCommandeFormation extends Mailable
{
    use Queueable, SerializesModels;

    public $commande_formation;

    /**
     * Create a new message instance.
     */
    public function __construct(CommandeFormation $commande_formation)
    {
        
        $this->commande_formation = $commande_formation;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Succès de la commande de formation N° '. $this->commande_formation->numero_commande,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.commande_formation.success_commande_formation',
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
