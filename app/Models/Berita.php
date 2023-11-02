<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;

class Berita extends Model implements Viewable
{


    use HasFactory, Sluggable, InteractsWithViews;

    protected $table = 'berita';

    protected $fillable = [
        'kategoriId',
        'title',
        'slug',
        'excerpt',
        'body',
        'foto',
        'published_at'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategoriId', 'id');
    }
}
