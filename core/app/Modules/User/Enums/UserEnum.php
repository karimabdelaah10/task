<?php

namespace App\Modules\User\Enums;

enum UserEnum
{
        public const FACEBOOK = 'facebook';

        public static function getAvailableSocialProviders(): array
        {
                return [
                        self::FACEBOOK,
                ];
        }
}
