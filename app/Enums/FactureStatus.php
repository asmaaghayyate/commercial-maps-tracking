<?php

namespace App\Enums;

enum FactureStatus: int
{
    case PAYEE = 1;
    case NON_PAYEE = 3;
    case EN_ATTENTE = 2;

    public function color(): string
    {
        return match ($this) {
            self::PAYEE => 'green',
            self::NON_PAYEE => 'red',
            self::EN_ATTENTE => 'orange',
        };
    }

    public function lang(): string
    {
        return match ($this) {
            self::PAYEE => 'Payé',
            self::NON_PAYEE => 'Non Payé',
            self::EN_ATTENTE => 'En Attente',
        };
    }
}
