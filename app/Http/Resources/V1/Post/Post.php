<?php

namespace App\Http\Resources\V1\Post;

use App\Http\Resources\V1\Image\ImageCollection;
use App\Http\Resources\V1\Video\VideoCollection;
use App\Models\Image;
use App\Models\Video;
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
            'desc' => $this->desc,
            'body' => $this->body,
            'time' => $this->created_at->format('d M Y'),
            'images'   => new ImageCollection( Image::where('post_id', $this->id)->get() ),
            'videos' => new VideoCollection( Video::where('post_id', $this->id)->get() ),
        ];
    }
}
