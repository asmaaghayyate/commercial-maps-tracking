<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        "current_location",
        "command_id"
    ];

    protected $casts = [
        'current_location' => 'array',
    ];

    public function command()
    {
        return $this->belongsTo(Command::class);
    }
}
