<?php

namespace App\Modules\BaseApp\BaseNotification\NotifierFactory;

use App\Modules\BaseApp\BaseNotification\Enums\NotificationEnums;
use App\Modules\BaseApp\BaseNotification\MailNotification\MailNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class NotifierFactory implements ShouldQueue
{
    use Queueable;

    private $users;

    public function send(array $notificationData)
    {
        if (isset($notificationData['users'])) {
            $this->users = $notificationData['users'];
        }
        // Mail Case
        if (isset($notificationData[NotificationEnums::MAIL])) {
            if (isset($notificationData['emails'])) {
                $emails = $notificationData['emails'];
                if (!is_array($notificationData['emails'])) {
                    $emails = [$notificationData['emails']];
                }
            } else {
                $emails = $this->users->pluck('email')->toArray();
            }
            (new MailNotification())->send($notificationData[NotificationEnums::MAIL], $emails);
        }

    }
}
