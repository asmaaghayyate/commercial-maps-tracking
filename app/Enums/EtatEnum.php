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
            self::INITIAL->value => 'success',
            self::EN_COURS->value => 'warning',
            self::FINAL->value => 'danger',
            default => 'transparent', // Fallback color
        };
    }
}
