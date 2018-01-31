<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class VoitureReservee extends Notification
{
    use Queueable;
    protected $nom;
    protected $prenom;
    protected $voiture;
    protected $dateDu;
    protected $dateAu;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->nom = $request->nom;
        $this->prenom = $request->prenom;
        $this->voiture = \App\Voiture::where('id', $request->voiture_id)->first();
        $this->dateDu = $request->dateDu;
        $this->dateAu = $request->dateAu;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->success()
                    ->subject('Nouvelle Réservation')
                    ->line($this->nom . ' ' . $this->prenom . ' vient de placer une nouvelle réservation pour la ' . $this->voiture->immatriculation . ' du ' . $this->dateDu . ' au ' . $this->dateAu )
                    ->action('Créer un nouveau client', url('/clients/create'))
                    ->line("Merci d'utiliser notre application!");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
