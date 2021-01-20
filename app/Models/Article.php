<?php

namespace App\Models;

use App\Traits\HasPhoto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasPhoto;

    protected $fillable = ['title', 'content', 'active', 'section_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    /**
     * @param Builder $builder
     */
    public function scopeActive(Builder $builder)
    {
        $builder->where('active', true);
    }

    public function scopeSearch($query, $filter)
    {
        return $query->where('title', 'like', '%' .$filter.  '%');
    }
}
