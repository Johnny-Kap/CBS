<?php

namespace App\Mail;

use App\Models\SouscrireAbonnement;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SuccessSouscriptionAbonnement extends Mailable
{
    use Queueable, SerializesModels;

    public $souscription_abonnement;

    /**
     * Create a new message instance.
     */
    public function __construct(SouscrireAbonnement $souscription_abonnement)
    {
        $this->souscription_abonnement = $souscription_abonnement;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Souscription abonnement N° '. $this->souscription_abonnement->numero_abonnement . ' reussi',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.souscrire_abonnement.success_abonnement',
            with: [
                'url' => 'http://127.0.0.1:8000/myprofile/confirmation-abonnement',
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
