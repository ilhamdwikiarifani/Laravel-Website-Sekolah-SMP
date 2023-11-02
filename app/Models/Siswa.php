<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    use HasFactory;

    protected $fillable = [
        'nama',
        'foto',
        'nisn',
        'nik',
        'jeniskelamin',
        'tempat',
        'tanggallahir',
        'alamat',
        'userbelajarid',
        'passwordbelajarid',
    ];
}
