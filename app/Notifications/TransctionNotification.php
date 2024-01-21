<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TransctionNotification extends Notification
{
    use Queueable;

    public  $users;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($users)
    {
        //
        $this->users = $users;
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

    public function toDatabase($notifiable){
        return [
            'message' => 'A user has interacted with the OtherService Payment Service.',
            'user_name' => $this->users->name, 
        ];
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
                    ->line('The introduction to the notification.')
                    ->line('User: ' . $this->users->name)
                    ->action('Notification Action', url('/'))
                    ->markdown('mail.otherservice',['users' => $this->users]);
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
