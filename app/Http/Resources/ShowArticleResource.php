<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowArticleResource extends ArticleListResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge(parent::toArray($request), [
            'content' => $this->content,
            'section_id' => $this->section_id,
            'gallery' => $this->gallery->map(function ($image) {
                return [
                    'image' => asset('storage/' . $image->path)
                ];
            }),
        ]);
    }
}
