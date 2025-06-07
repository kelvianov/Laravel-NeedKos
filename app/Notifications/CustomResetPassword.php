<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordBase;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPassword extends ResetPasswordBase
{
    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */    public function toMail($notifiable)
    {
        $url = $this->resetUrl($notifiable);

        return (new MailMessage)
            ->subject('Reset Password - KosKu')
            ->view('emails.reset-password', [
                'url' => $url,
                'name' => $notifiable->name
            ]);
    }
}
