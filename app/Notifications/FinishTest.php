<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Console\Commands\cronEmail;

class FinishTest extends Notification
{
    use Queueable;

    protected $lesson;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($lesson)
    {
        $this->lesson = $lesson;
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
            'mail',
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
        $url = config('setting.link_test_default').$this->lesson->lesson_id;
        return (new MailMessage)
                    ->bcc($notifiable->email)
                    ->subject(trans('adminMess.mailTestLesson_subject'))
                    ->greeting(trans('adminMess.mail_dear'))
                    ->line(trans('adminMess.mailTestLesson_line1.1').$this->lesson->lesson_name.trans('adminMess.mailTestLesson_line1.2'))
                    ->line(trans('adminMess.mailTestLesson_line2'))
                    ->action(trans('adminMess.mailTestLesson_action'), $url)
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
