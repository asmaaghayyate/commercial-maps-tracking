<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commercial extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'genre',
        'type_deplacement',
        'identite',
        'adresse',
        'date_debut',
        'date_fin',
        'type_contrat',
        'departement_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
}
