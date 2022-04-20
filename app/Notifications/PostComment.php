<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostComment extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($Data)
    {
        //
        $this->Data = $Data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
        ->name($this->Data['name'])
        ->line($this->Data['body'])
        ->action($this->Data['offerText'], $this->Data['offerUrl'])
        ->line($this->Data['thanks']);
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
                'post_id' => $this->Data['post_id'],
                'post_slug' => $this->Data['post_slug'],
                'post_title'  => $this->Data['post_title'],
                'post_url'  => $this->Data['post_url'],
                'commenter_name'  => $this->Data['commenter_name'],
                'message'  => $this->Data['message']
            ];
    }
}
