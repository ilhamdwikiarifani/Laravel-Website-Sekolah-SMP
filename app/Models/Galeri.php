<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{

    protected $table = 'galeri';

    use HasFactory;

    protected $fillable = [
        'foto',
        'waktu',
        'caption',
    ];
}
