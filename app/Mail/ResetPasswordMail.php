<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $email;

    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    public function build()
    {
        return $this->view('admin.auth.reset_password') // Assurez-vous que le chemin est correct
                    ->with([
                        'token' => $this->token,
                        'email' => $this->email,
                    ]);
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Réinitialisation du mot de passe',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'admin.auth.reset_password', // Utilisez le même chemin ici si nécessaire
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
