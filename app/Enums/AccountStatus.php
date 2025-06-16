<?php

namespace App\Enums;

enum AccountStatus: int
{
    case INACTIVE = 1;
    case PENDING = 2;
    case ACTIVE = 3;

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
