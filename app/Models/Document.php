<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'document';

    use HasFactory;

    protected $fillable = [
        'nama',
        'file',
        'deskripsi',
        'waktu',
    ];
}
