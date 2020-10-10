<?php

namespace App\Http\Resources\V1\Category;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function($item) {
                return [
                    'id'    => $item->id,
                    'title' => $item->title,
                    'desc' => $item->desc,
                    'image' => $item->image,
                    'time' => $item->created_at->format('d M Y'),
                ];
            })
        ];
    }
}
