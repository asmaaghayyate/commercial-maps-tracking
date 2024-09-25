<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable; // Import the Authenticatable trait
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Laravel\Sanctum\HasApiTokens;

class Commercial extends Model implements AuthenticatableContract
{
    use HasFactory , Authenticatable , HasApiTokens;

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

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
}
