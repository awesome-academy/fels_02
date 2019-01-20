<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Carbon\Carbon;

class TestLessonNotify extends Notification implements ShouldQueue
{
    use Queueable;
    protected $test_user;

    public function __construct($test_user)
    {
        
       $this->test_user=$test_user;
    }

    public function via($notifiable)
    {

        return [
            'mail',
            'database'
        ];
    }

    public function toDatabase($notifiable)
    {

        return [
            'user' => auth()->user(),
            'exam' => $this->test_user,
        ];
    }

    public function toMail($notifiable)
    {

        $url = "http://127.0.0.1:8000/admin" ;

        return (new MailMessage)
            ->bcc($notifiable->email)
            ->subject(trans('adminMess.mail_subject'))
            ->greeting(trans('adminMess.mail_greeting'))
            ->line(auth()->user()->username." ".trans('adminMess.mail_line'))
            ->action(trans('adminMess.mail_action'), $url)
            ->line(trans('adminMess.mail_line2'));
    }
}
