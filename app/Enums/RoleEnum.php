<?php

namespace App\Enums;

enum RoleEnum: string
{
    case ADMIN = 'admin';
    case CLIENT = 'client';
    case COMMERCIAL = 'commercial';

    public static function getRoles(): array
    {
        return [
            self::ADMIN->value,
            self::CLIENT->value,
            self::COMMERCIAL->value,
        ];
    }
}
