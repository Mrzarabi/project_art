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
                    'writer' => $item->writer,
                    'title' => $item->title,
                    'desc' => $item->desc,
                    's_link' => $item->s_link,
                    'date' => $item->date,
                    'Written_time' => $item->time,
                    'images'   => new ImageCollection(Image::where('praised_id', $item->id)->get()),
                    'time' => $item->created_at->format('d M Y'),
                ];
            })
        ];
    }
}
