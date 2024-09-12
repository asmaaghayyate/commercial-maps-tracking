<?php

namespace App\Enums;

enum ClientType :string
{
    case ENTREPRISE = "entreprise";
    case PARTICULIER = "particulier";

    public function lang(): string
    {
        return match ($this) {
            self::ENTREPRISE => 'entreprise',
            self::PARTICULIER => 'particulier',
        };
    }
}
