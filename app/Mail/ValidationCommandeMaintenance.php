<?php

namespace App\Mail;

use App\Models\CommandeMaintenanceAutomobile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ValidationCommandeMaintenance extends Mailable
{
    use Queueable, SerializesModels;

    public $commande_validation_maintenance;

    /**
     * Create a new message instance.
     */
    public function __construct(CommandeMaintenanceAutomobile $commande_validation_maintenance)
    {
        $this->commande_validation_maintenance = $commande_validation_maintenance;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Commande de maintenance N° '. $this->commande_validation_maintenance->numero_commande .' '. 'validée',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.commande_maintenance.validation_commande_maintenance',
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
