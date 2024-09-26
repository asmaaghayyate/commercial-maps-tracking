<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

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
            $admin->password = Hash::make($admin->password);
        });
    }
}
