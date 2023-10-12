<?php

namespace App\Modules\Notification\UseCases;

use App\Modules\Notification\Jobs\SendActivationCode;
use App\Modules\User\User;

class SendUserNotifications
{

    public function sendActivationCode(User $user)
    {
        $notificationData = [
            'users' => collect([$user]),
        ];
        if ($user->email) {
            $notificationData['email'] = [
                'subject' => trans('app.Activate Account', [], $user->language),
                'data' => ['message' => 'emails.Activate Code Message'],
            ];

        }
        SendActivationCode::dispatch(user: $user, notificationData: $notificationData);
    }
}
