<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as BaseVerifyEmail;
use Illuminate\Support\Facades\URL;

class VerifyEmailCustom extends BaseVerifyEmail
{
    /**
     * Генерируем подписанную ссылку на именованный роут 'verification.verify'
     * ИМЕННО этот роут Laravel/Fortify ждёт для подтверждения.
     */
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(config('auth.verification.expire', 60)),
            [
                'id'   => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
    }
}
