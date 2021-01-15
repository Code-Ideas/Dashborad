<?php

namespace App\Traits;

use App\Models\Photo;

trait HasPhoto
{
    public static function bootHasPhoto()
    {
        static::deleting(function ($model) {
            $model->deleteImages();
        });
    }

    /**
     * @return mixed
     */
    public function photo()
    {
        return $this->morphOne(Photo::class, 'photoable')->where('type', 'main');
    }

    /**
     * @return mixed
     */
    public function gallery()
    {
        return $this->morphMany(Photo::class, 'photoable')->where('type', 'gallery');
    }

    /**
     * @return mixed
     */
    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }

    /**
     * Adds an image or multiple images to the model.
     *
     * @param $path
     * @param string $type
     * @return static
     */
    public function storeImage($path, $type = 'main')
    {
        $photo = $this->photo()->create(['path' => $path, 'type' => $type]);
        return $photo;
    }

    /**
     * Replaces the current image with a new one.
     * @param $path
     * @param string $type
     */
    public function updateImage($path, $type = 'main')
    {
        if ($type == 'main' && $this->photo) {
            $this->photo->delete();
        } else {
            $this->gallery->each(function ($photo) {
                $photo->delete();
            });
        }
        $this->storeImage($path, $type);
    }

    /**
     * Deletes all images.
     */
    public function deleteImages()
    {
        $this->photos->each(function ($photo) {
            $photo->delete();
        });
    }

    /**
     * @return null|string
     */
    public function getImageAttribute()
    {
        $photo = $this->photo;
        if (! $photo) {
            return null;
        }

        return asset('storage/' . $photo->path);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getImagesAttribute()
    {
        $photos = $this->gallery;
        if (! $photos || ! $photos->count()) {
            return collect([]);
        }

        return $photos->map(function ($photo) {
            return $photo;
        });
    }
}
