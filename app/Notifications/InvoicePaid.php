<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class InvoicePaid extends Notification
{
    use Queueable;

    public $user;

    /*
     * public function __construct(User $user)
    {
        $this->user = $user;
    }*/

    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        // return ['mail'];
        // return ['mail', 'database'];
        return ['database']; // for database notification
    }

    public function toMail($notifiable)
    {
//        return (new MailMessage)
//                    ->line('My ass is the coldest place on earth.')
//                    ->action('Notification Action', url('/'))
//                    ->error("hosdike")
//                    ->subject("your boobs are trangular")
//                    ->line('Thank you for using our application!');

        // to change the view on the email
        return (new MailMessage)
            ->view('welcome', ['user' => $this->user])
            ->subject("your boobs are Juicy, Ummmmmmmm");
    }

    public function toArray($notifiable)
    {
        return [
            'data' => 'May be I am the perfect stranger'
        ];
    }
}
