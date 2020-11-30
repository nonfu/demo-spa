<?php

namespace App\Http\Resources;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'summary' => $this->summary,
            'content' => empty($this->content) ? '' : Markdown::convertToHtml($this->content),
            'image_url' => $this->image_url,
            'author' => User::make($this->author),
            'category' => Category::make($this->category),
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
