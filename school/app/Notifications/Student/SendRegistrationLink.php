<?php

namespace App\Notifications\Student;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\SendGrid\SendGridChannel;
use NotificationChannels\SendGrid\SendGridMessage;

class SendRegistrationLink extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [SendGridChannel::class];
    }

    public function toSendGrid($notifiable)
    {
        /**@var User $notifiable */

        $url = config('services.uniranks.student.website');
        $templateId = 'd-9df5ffd9dc0240a8b983aa4b9d61178c';
        return (new SendGridMessage($templateId))->payload([
            "student_name" => $notifiable->name,
            "school_name" => $notifiable->school->school_name,
            "button_url" => $url,
            "email" => $notifiable->email,
            "user_pass" => '12345678'
        ]);

    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
