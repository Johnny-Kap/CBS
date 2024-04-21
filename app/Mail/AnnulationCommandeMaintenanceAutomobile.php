<?php

namespace App\Mail;

use App\Models\CommandeMaintenanceAutomobile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AnnulationCommandeMaintenanceAutomobile extends Mailable
{
    use Queueable, SerializesModels;

    public $commande_maintenance_annulee;

    /**
     * Create a new message instance.
     */
    public function __construct(CommandeMaintenanceAutomobile $commande_maintenance_annulee)
    {
        $this->commande_maintenance_annulee = $commande_maintenance_annulee;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Commande de maintenance automobile N° '. $this->commande_maintenance_annulee->numero_commande .' '. 'annulée',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.commande_maintenance_automobile.annulation_commande_maintenance',
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
