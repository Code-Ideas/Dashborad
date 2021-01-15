<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    protected $fillable = ['path', 'type'];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($photo) {
            if (static::where('path', $photo->path)->exists()) {
                Storage::disk('public')->delete($photo->path);
            }
        });
    }

    /**
     * Gets the owning models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function photoable()
    {
        return $this->morphTo();
    }
}
