<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable; // Import the Authenticatable trait
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Commercial extends Model implements AuthenticatableContract
{
    use HasFactory , Authenticatable , HasApiTokens;
    use Notifiable;

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


    public static function boot()
    {
        parent::boot();

        static::creating(function ($commercial) {
            $commercial->password = Hash::make($commercial->password);
        });
    }



    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
}
