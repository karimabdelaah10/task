<?php

namespace App\Modules\User;

enum UsersEnum
{
    public const ADMIN = 'admin',
        USER = 'user';

    public static function getTypes(): array
    {
        return [
            self::ADMIN,
            self::USER
        ];
    }
}
