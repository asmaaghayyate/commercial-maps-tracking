<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'commercial_id',
        'admin_id',
        'destination',
        'destination_name',
        'status'
    ];

    protected $casts = [
        'destination' => 'array', // Automatically cast JSON column to array
    ];

    /**
     * Get the client associated with the command detail.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    /**
     * Get the commercial associated with the command detail.
     */
    public function commercial()
    {
        return $this->belongsTo(Commercial::class);
    }

    /**
     * Get the admin associated with the command detail.
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
