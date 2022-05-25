<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Album extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'created_by',
    ];

    protected static function getAllPhotos()
    {
        $photos = Media::inRandomOrder()->get();
        return $photos;
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->crop('crop-center', 400, 400)
            ->width(200)
            ->height(200)
            ->sharpen(10);
            
        $this->addMediaConversion('main')
            ->height(300)
            ->sharpen(10);

        $this->addMediaConversion('bw')
            ->greyscale()
            ->height(300)
            ->sharpen(10);
    }
}
