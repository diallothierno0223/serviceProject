<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Offre;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserPostuleOffreNotification extends Notification
{
    use Queueable;

    public $user;
    public $offre;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Offre $offre)
    {
        $this->user = $user;
        $this->offre = $offre;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
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
                    ->line($this->user->name . " a postuler a votre offre d'emploi et souhaite travailer pour vous")
                    ->action('cliqué ici pour voir son profile', route("offre.showProfilePostuler", ["user" => $this->user->id, "offre" => $this->offre->id]))
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
        return [
            "user_postule_id" => $this->user->id,
            "user_postule_name" => $this->user->name,
            "user_postule_email" => $this->user->email,
            "offre_id" => $this->offre->id,
            "offre_lieu_cible" => $this->offre->lieu_cible
        ];
    }
}
