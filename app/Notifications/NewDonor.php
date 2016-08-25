<?php namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewDonor extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail()
    {
        return (new MailMessage)
            ->line([
               'Thank you for donating to Open Arms Ministry!',
                'Your Donation Account has been set up',
                'Below you will find a link that will ask you to reset your password',
            ])
            ->action('Reset Password and Start managing your donations.', url('password/reset', $this->token))
            ->line('Please do not forward this email to others.  The link above is for you only.');
    }
}