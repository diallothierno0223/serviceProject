<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Demande;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserPostuleDemandeResponseNotification extends Notification
{
    use Queueable;

    public $user;
    public $demande;
    public $action;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Demande $demande, $action)
    {
        $this->user = $user;
        $this->demande = $demande;
        $this->action = $action;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if($this->action == "accepter"){
            $basic  = new \Vonage\Client\Credentials\Basic("4c1e9a11", "hgH3Fqfbi6scITGY");
            $client = new \Vonage\Client($basic);

            $response = $client->sms()->send(
                new \Vonage\SMS\Message\SMS("2250102236740", "PrestaService", "Bonjour monsieur ".$this->user->name.", Mr ".$notifiable->name." a accepter votre demande derecrutement.contactez le ici:".$notifiable->numero)
            );
            $message = $response->current();
            return (new MailMessage)
                        ->line('Bonjour '.$notifiable->name)
                        ->line($this->user->name." a accepter votre demande derecrutement")
                        ->line("veullez le contacter sur ce numero :".$this->user->numero)
                        ->line("ou sur cette email : ".$this->user->email)
                        // ->action('Notification Action', url('/'))
                        ->line('merci d\'utiliser notre plate forme !');
        }
        if($this->action == "refuser"){
            $basic  = new \Vonage\Client\Credentials\Basic("4c1e9a11", "hgH3Fqfbi6scITGY");
            $client = new \Vonage\Client($basic);

            $response = $client->sms()->send(
                new \Vonage\SMS\Message\SMS("2250102236740", "PrestaService", "Bonjour monsieur ".$this->user->name.", Mr ".$notifiable->name." a refusez votre demande de recrutement")
            );
            $message = $response->current();

            return (new MailMessage)
                        ->line('Bonjour '.$notifiable->name)
                        ->line($this->user->name." a refusez votre demande de recrutement")
                        ->line("vous pouvez postuler a d'autre offre d'emploi ")
                        // ->action('Notification Action', url('/'))
                        ->line('merci d\'utiliser notre plate forme !');
        }
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
            "status" => $this->action,
            "user_id" => $this->user->id,
            "user_name" => $this->user->name,
            "user_email" => $this->user->email,
            "offre_id" => $this->demande->id,
            "offre_lieu_cible" => $this->demande->lieu_cible
        ];
    }
}
