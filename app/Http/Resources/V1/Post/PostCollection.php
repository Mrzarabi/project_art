<?php

namespace App\Http\Resources\V1\Post;

use App\Http\Resources\V1\Image\ImageCollection;
use App\Http\Resources\V1\Video\VideoCollection;
use App\Models\Image;
use App\Models\Video;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
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
                    'category' => $item->category_id ? $item->category->title : '',
                    'title' => $item->title,
                    'body' => $item->body,
                    'time' => $item->created_at->format('d M Y'),
                    'images'   => new ImageCollection(Image::where('post_id', $item->id)->get()),
                    'videos' => new VideoCollection(Video::where('post_id', $item->id)->get()),
                ];
            })
        ];
    }
}
