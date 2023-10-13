<?php

namespace App\Modules\Transaction\Enum;

enum FactoryEnum
{
    public const DATA_PROVIDER_X = 'DataProviderX',
        DATA_PROVIDER_Y = 'DataProviderY';

    public static function getProviderHandlerClass($provider): string
    {
        $providers = [
            self::DATA_PROVIDER_X => 'App\Modules\Transaction\Handler\XHandler',
            self::DATA_PROVIDER_Y => 'App\Modules\Transaction\Handler\YHandler',
        ];
        return $providers[$provider];
    }

    public static function getProvidersPerfixes()
    {
        return[
            self::DATA_PROVIDER_X,
            self::DATA_PROVIDER_Y,
        ];
    }
}
