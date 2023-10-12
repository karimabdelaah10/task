<?php

namespace App\Modules\BaseApp\BaseNotification\Enums;

abstract class NotificationEnums
{
    public const SMS = 'sms',
                MAIL = 'mail',
                FCM = 'fcm',
                DB = 'db';
}
