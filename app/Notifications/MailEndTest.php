<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MailEndTest extends Notification
{
    use Queueable;
    protected $lessonx;

    public function __construct($lessonx)
    {
        $this->lessonx=$lessonx;
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
    public function toMail($notifiable)
    {
        $url = "http://127.0.0.1:8000/test-lesson/".$this->lessonx->lesson_id;
        return (new MailMessage)
            ->bcc($notifiable->email)
            ->subject(trans('adminMess.cron_subject'))
            ->greeting(trans('adminMess.cron_greeting'))
            ->line(trans('adminMess.cron_line'))
            ->action(trans('adminMess.cron_action'),$url)
            ->line(trans('adminMess.cron_line2'));
    }
}
