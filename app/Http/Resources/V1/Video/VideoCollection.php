<?php

namespace App\Http\Resources\V1\Video;

use Illuminate\Http\Resources\Json\ResourceCollection;

class VideoCollection extends ResourceCollection
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
                    'videoUrl' => $item->videoUrl,
                    'time' => $item->created_at->format('d M Y - H:m'),
                ];
            })
        ];
    }
}
