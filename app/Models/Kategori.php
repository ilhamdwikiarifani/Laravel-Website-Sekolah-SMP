<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Kategori extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    protected $table = 'kategori';

    protected $fillable = [
        'nama',
        'slug',
        'id',
    ];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function berita()
    {
        return $this->hasMany(Berita::class);
    }
}
