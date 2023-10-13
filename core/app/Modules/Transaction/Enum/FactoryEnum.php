<?php

namespace App\Modules\Transaction\Enum;

enum FactoryEnum
{
    public const DATA_PROVIDER_X = 'DataProviderX',
        DATA_PROVIDER_Y = 'DataProviderY';

    //add new data provider prefix here

    public static function getProviderHandlerClass($provider): string
    {
        $providers = [
            self::DATA_PROVIDER_X => 'App\Modules\Transaction\Handler\XHandler',
            self::DATA_PROVIDER_Y => 'App\Modules\Transaction\Handler\YHandler',
            //add new data provider Handler Class map  here
        ];
        return $providers[$provider];
    }

    public static function getProvidersPrefixes(): array
    {
        return [
            self::DATA_PROVIDER_X,
            self::DATA_PROVIDER_Y,
            //add new data provider prefix here
        ];
    }
}
