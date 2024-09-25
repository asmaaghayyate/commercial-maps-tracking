<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable; // Import the Authenticatable trait
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Commercial extends Model implements AuthenticatableContract, JWTSubject
{
    use HasFactory , Authenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'genre',
        'phone',
        'type_deplacement',
        'identite',
        'adresse',
        'date_debut',
        'date_fin',
        'type_contrat',
        'departement_id'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(array $extraClaims = [])
    {
        return [];
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
}
