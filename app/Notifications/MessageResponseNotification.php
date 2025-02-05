<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageResponseNotification extends Notification
{
    use Queueable;

    public $reponse;
    public $title;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $response, string $title)
    {
        $this->reponse = $response;
        $this->title = $title;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject($this->title)
            ->greeting('Bonjour,')
            ->line($this->reponse)
          //  ->action('Notification Action', url('/'))
            ->line('Merci pour votre attention !' . " " . config("app.name"));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
