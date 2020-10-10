<?php

namespace App\Http\Resources\V1\Praised;

use App\Http\Resources\V1\Image\ImageCollection;
use App\Models\Image;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PraisedCollection extends ResourceCollection
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
                    'title' => $item->title,
                    'desc' => $item->desc,
                    's_link' => $item->s_link,
                    'date' => $item->date ? $item->date->format('d M Y') : null,
                    'images'   => new ImageCollection(Image::where('exhibition_id', $item->id)->get()),
                ];
            })
        ];
    }
}
