<?php

namespace App\Notifications;

use App\Models\Posts;
use App\Models\Profiles;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LikeNotification extends Notification
{
    use Queueable;

    protected $posts;
    protected $profile;
    /**
     * Create a new notification instance.
     */
    public function __construct(Posts $posts, Profiles $profiles)
    {
        $this->posts = $posts;
        $this->profile = $profiles;
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

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'post_id' => $this->posts->id,
            'post_caption' => $this->posts->post_caption,
            'post_image' => $this->posts->post_image,
            'username' => $this->profile->username,
            'profile' => $this->profile->profile,
        ];
    }
}
