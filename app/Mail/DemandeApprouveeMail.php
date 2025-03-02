<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Demande;
class DemandeApprouveeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $demande;

    /**
     * Crée une nouvelle instance du message.
     *
     * @param Demande $demande L'instance de la demande
     */
    public function __construct(Demande $demande)
    {
        $this->demande = $demande;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Votre demande a été approuvée',
            replyTo: [$this->demande->email] // Utiliser l'email de la demande pour la réponse
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.demande_approuvee', // Vue à créer pour l'email
            with: [
                'demande' => $this->demande // Passer les données de la demande à la vue
            ]
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
