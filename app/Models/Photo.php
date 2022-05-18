<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Photo extends Model implements HasMedia
{
    use InteractsWithMedia;

    // protected $table = 'media';

    // protected $fillable = [
    //     'album_title',
    //     'image',
    // ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->crop('crop-center', 400, 400)
            ->width(200)
            ->height(200)
            ->sharpen(10);
    }

    // public function album()
    // {
    //     return $this->belongsTo(Album::class);
    // }
}
