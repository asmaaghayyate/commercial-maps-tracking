<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Optionally, if you want to hash passwords on creation
    public static function boot()
    {
        parent::boot();

        static::creating(function ($admin) {
            $admin->password = bcrypt($admin->password);
        });
    }
}
