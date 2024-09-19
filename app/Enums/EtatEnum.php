<?php

namespace App\Enums;

enum EtatEnum: string
{
    case INITIAL = 'initial';
    case EN_COURS = 'en cours';
    case FINAL = 'final';

   

    public static function getColor(string $etat): string
    {
        return match ($etat) {
            self::INITIAL->value => 'green',
            self::EN_COURS->value => 'yellow',
            self::FINAL->value => 'red',
            default => 'transparent', // Fallback color
        };
    }
}
