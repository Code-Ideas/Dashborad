<?php

namespace App\Traits;

use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
    public function thumbnail()
    {
        return $this->morphOne(Photo::class, 'photoable')->where('type', 'thumb');
    }

    /**
     * @return mixed
     */
    public function largeSize()
    {
        return $this->morphOne(Photo::class, 'photoable')->where('type', 'large');
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
     * @return mixed
     */
    public function mainPhotos()
    {
        return $this->morphMany(Photo::class, 'photoable')->where('type', '!=', 'gallery');
    }

    /**
     * Adds an image or multiple images to the model.
     *
     * @param $file
     * @param $target
     * @param $model
     * @param string $type
     * @return static
     */
    public function storeImage($file, $target, $model, $type = 'main')
    {
        $image = Image::make($file);
        $fileName = $model.time().'.'.$file->getClientOriginalExtension();
        $image->fit(800, 600, function ($constraint) {
            $constraint->aspectRatio();
        });
        Storage::disk('public')->put($path = $target.'/large/'.'large_'.$fileName, (string)$image->encode('jpg'));
        $photo = $this->photos()->create(['path' => $path, 'type' => 'large']);
        $image->fit(250, 200, function ($constraint) {
            $constraint->aspectRatio();
        });
        Storage::disk('public')->put($path = $target.'/thumb/'.'thumb_'.$fileName, (string)$image->encode('jpg'));
        $photo = $this->photos()->create(['path' => $path, 'type' => 'thumb']);
        $photo = $this->photo()->create(['path' => $file->storeAs($target.'/original/', $fileName, 'public'), 'type' => $type]);
        return $photo;
    }

    /**
     * Replaces the current image with a new one.
     * @param $file
     * @param $target
     * @param $model
     * @param string $type
     */
    public function updateImage($file, $target, $model, $type = 'main')
    {
        if ($this->mainPhotos) {
            $this->mainPhotos->each(function ($photo) {
                $photo->delete();
            });
        }
        $this->storeImage($file, $target, $model, $type);
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
     * @return null|string
     */
    public function getThumbAttribute()
    {
        $photo = $this->thumbnail;
        if (! $photo) {
            return null;
        }

        return asset('storage/' . $photo->path);
    }

    /**
     * @return null|string
     */
    public function getLargeAttribute()
    {
        $photo = $this->largeSize;
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
