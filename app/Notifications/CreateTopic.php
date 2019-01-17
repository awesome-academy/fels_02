<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Topic;

class CreateTopic extends Notification
{
    use Queueable;

    protected $topic;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Topic $topic)
    {
        $this->topic = $topic;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [
            'database',
            'mail',
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'topic' => $this->topic,
            'creater' => auth()->user(),
            'user' => $notifiable,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toMail($notifiable)
    {
        $url = config('setting.link_topic_default') ;
        return (new MailMessage)
            ->bcc($notifiable->email)
            ->subject(trans('adminMess.mail_subject'))
            ->greeting(trans('adminMess.mail_dear'))
            ->line(trans('adminMess.mail_line1'))
            ->line(trans('adminMess.mail_line2'))
            ->action(trans('adminMess.mail_action'), $url)
            ->line(trans('adminMess.mail_line3'));
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
