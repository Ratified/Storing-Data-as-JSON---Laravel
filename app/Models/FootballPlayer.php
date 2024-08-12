<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FootballPlayer extends Model
{
    use HasFactory;

    protected $fillable = ["name", "course", "position", "nationality", "availability_times"];

    protected $casts = [
        "availability_times" => "array"
    ];
}
