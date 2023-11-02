<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tautan extends Model
{

    protected $table = 'tautan';
    use HasFactory;


    protected $fillable = [
        'nama',
        'link',
        'deskripsi',
        'waktu',
    ];
}
