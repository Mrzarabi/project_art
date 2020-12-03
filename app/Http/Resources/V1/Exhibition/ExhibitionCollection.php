<?php

namespace App\Http\Resources\V1\Exhibition;

use App\Http\Resources\V1\Image\ImageCollection;
use App\Http\Resources\V1\Video\VideoCollection;
use App\Models\Image;
use App\Models\Video;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ExhibitionCollection extends ResourceCollection
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
                    'body' => $item->body,
                    'i_link' => $item->i_link,
                    'f_link' => $item->f_link,
                    's_link' => $item->s_link,
                    'date' => $item->date,
                    'address' => $item->address,
                    'images'   => new ImageCollection(Image::where('exhibition_id', $item->id)->get()),
                    'videos' => new VideoCollection(Video::where('exhibition_id', $item->id)->get()),
                    'time' => $item->created_at->format('d M Y'),
                ];
            })
        ];
    }
}
