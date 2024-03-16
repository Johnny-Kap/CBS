<?php

namespace App\Mail;

use App\Models\CommandeMaintenanceAutomobile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SuccessCommandeMaintenance extends Mailable
{
    use Queueable, SerializesModels;

    public $commande_maintenance;

    /**
     * Create a new message instance.
     */
    public function __construct(CommandeMaintenanceAutomobile $commande_maintenance)
    {
        $this->commande_maintenance = $commande_maintenance;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Succès de la commande Maintenance N° '. $this->commande_maintenance->numero_commande,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.commande_maintenance_automobile.success_commande_maintenance',
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
