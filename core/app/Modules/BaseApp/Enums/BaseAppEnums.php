<?php

namespace App\Modules\BaseApp\Enums;

class BaseAppEnums
{
    public const
        COUNTRY = 'country',
        DASHBOARD = 'dashboard',
        APP_PREFIX = 'app',
        COUNTRY_MODULE_PREFIX = 'countries',
        PROFILE_MODULE_PREFIX = 'profile',
        SUCCESS = 'success',
        ERROR = 'error',
        INFO = 'info',
        WARNING = 'warning';


    public function getModules(): array
    {
        return [
            self::COUNTRY,
        ];
    }
}
