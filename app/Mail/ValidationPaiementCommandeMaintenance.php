<?php

namespace App\Mail;

use App\Models\CommandeMaintenanceAutomobile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ValidationPaiementCommandeMaintenance extends Mailable
{
    use Queueable, SerializesModels;

    public $commande_validation_paiement_main;

    /**
     * Create a new message instance.
     */
    public function __construct(CommandeMaintenanceAutomobile $commande_validation_paiement_main)
    {
        $this->commande_validation_paiement_main = $commande_validation_paiement_main;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Paiement de la commande de maintenance N° '.$this->commande_validation_paiement_main->numero_commande.' validée',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.commande_maintenance_automobile.validation_paiement_maintenance',
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
