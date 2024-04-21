<?php

namespace App\Mail;

use App\Models\CommandeReservationAppartementHotel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SuccessCommandeReservationAppartHotel extends Mailable
{
    use Queueable, SerializesModels;

    public $commande_reservation_success;

    /**
     * Create a new message instance.
     */
    public function __construct(CommandeReservationAppartementHotel $commande_reservation_success)
    {
        $this->commande_reservation_success = $commande_reservation_success;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Succès de la commande de reservation N° '. $this->commande_reservation_success->numero_commande,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.commande_reservation.success_commande_reservation',
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
