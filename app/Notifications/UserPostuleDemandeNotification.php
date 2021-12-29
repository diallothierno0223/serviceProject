<?php

namespace App\Notifications;

use Vonage\Client;
use App\Models\User;
use App\Models\Demande;
use Illuminate\Bus\Queueable;
use Nexmo\Laravel\Facade\Nexmo;
use Vonage\Client\Credentials\Basic;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserPostuleDemandeNotification extends Notification
{
    use Queueable;

    public $user;
    public $demande;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Demande $demande)
    {
        $this->user = $user;
        $this->demande = $demande;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', "mail", 'nexmo'];
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
            ->line('Bonsoir Mr/Mme '. $notifiable->name)
            ->line($this->user->name . " a postuler a votre demande d'emploi et souhaite vous recruter")
            ->action('cliqué ici pour voir son profile', route("demande.showProfilePostuler", ["user" => $this->user->id, "demande" => $this->demande->id]))
            ->line('merci a vous pour l\'utilisation de notre plateforme !');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {

        $basic  = new \Vonage\Client\Credentials\Basic("4c1e9a11", "hgH3Fqfbi6scITGY");
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("2250102236740", "PrestaService", "Bonjour monsieur ".$notifiable->name.", Mr ".$this->user->name." a postuler a votre demande d'emploi.contactez le numero suivant :".$this->user->numero)
        );
        $message = $response->current();

        return [
            "user_postule_id" => $this->user->id,
            "user_postule_name" => $this->user->name,
            "user_postule_email" => $this->user->email,
            "demande_id" => $this->demande->id,
            "demande_lieu_cible" => $this->demande->lieu_cible
        ];
    }
    /**
     * Get the Vonage / SMS representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\NexmoMessage
     */
    // public function toNexmo($notifiable)
    // {
    //     return (new NexmoMessage)
    //                 ->content('Your SMS message content')
    //                 ->to('002250102236740');
    // }
}
