<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Laravel\Sanctum\HasApiTokens;

class Client extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'adresse',
    ];
}
