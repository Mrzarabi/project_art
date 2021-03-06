<?php

namespace App\Http\Resources\V1\Image;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ImageCollection extends ResourceCollection
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
            'data' => $this->collection->map( function($item) {
                return [
                    'id' => $item->id,
                    'image' => $item->image,
                    'time' => $item->created_at->format('d M Y - H:m'),
                ];
            })
        ];
    }
}
