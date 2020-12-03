<?php

namespace App\Http\Resources\V1\Event;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EventCollection extends ResourceCollection
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
                    'title' => $item->title,
                    'i_link' => $item->i_link,
                    'f_link' => $item->f_link,
                    'body' => $item->body,
                    'date' => $item->date,
                    'address' => $item->address,
                    'time' => $item->created_at->format('d M Y'),
                ];
            })
        ];
    }
}
