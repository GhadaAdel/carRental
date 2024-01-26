<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateMessage extends Notification
{
    use Queueable;
    private $contact_id;
    private $user_create;
    private $message;
    /**
     * Create a new notification instance.
     */
    public function __construct($contact_id, $user_create, $message)
    {
        $this->contact_id = $contact_id;
        $this->user_create = $user_create;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'contact_id'=> $this->contact_id,
            'user_create'=> $this->user_create,
            'message'=> $this->message
        ];
    }
}
