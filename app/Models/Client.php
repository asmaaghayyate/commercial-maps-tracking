<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Client extends Model implements JWTSubject
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'adresse',
    ];

    // JWTSubject methods
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(array $extraClaims = [])
    {
        return [];
    }
}
