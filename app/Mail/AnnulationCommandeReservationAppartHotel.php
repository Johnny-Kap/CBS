<?php

namespace App\Mail;

use App\Models\CommandeReservationAppartementHotel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AnnulationCommandeReservationAppartHotel extends Mailable
{
    use Queueable, SerializesModels;

    public $commande_reserv_annulee;

    /**
     * Create a new message instance.
     */
    public function __construct(CommandeReservationAppartementHotel $commande_reserv_annulee)
    {
        $this->commande_reserv_annulee = $commande_reserv_annulee;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Commande de reservation N° '. $this->commande_reserv_annulee->numero_commande .' '. 'annulée',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.commande_reservation.annulation_commande_reservation',
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
