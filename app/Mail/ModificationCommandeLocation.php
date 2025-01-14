<?php

namespace App\Mail;

use App\Models\CommandeLocation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ModificationCommandeLocation extends Mailable
{
    use Queueable, SerializesModels;

    public $commande_location_modifie;

    /**
     * Create a new message instance.
     */
    public function __construct(CommandeLocation $commande_location_modifie)
    {
        $this->commande_location_modifie = $commande_location_modifie;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Modification de la Commande Location'. $this->commande_location_modifie->numero_commande,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.commande_location.modification_commande',
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
