<?php

namespace App\Http\Resources\V1\Category;

use App\Http\Resources\V1\Post\PostCollection;
use App\Models\Post;
use Illuminate\Http\Resources\Json\JsonResource;

class Category extends JsonResource
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
            'desc' => $this->desc,
            'image' => $this->image,
            'children' => new SubCategoryCollection($this->categories),
            'time' => $this->created_at->format('d M Y'),
            'posts' => new PostCollection( Post::where('category_id', $this->id)->get() ),
        ];
    }
}
