<?php

namespace App\Http\Resources\V1\Exhibition;

use App\Http\Resources\V1\Image\ImageCollection;
use App\Http\Resources\V1\Video\VideoCollection;
use App\Models\Image;
use App\Models\Video;
use Illuminate\Http\Resources\Json\JsonResource;

class Exhibition extends JsonResource
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
            'body' => $this->body,
            'i_link' => $this->i_link,
            'f_link' => $this->f_link,
            's_link' => $this->s_link,
            'date' => $this->date,
            'address' => $this->address,
            'images'   => new ImageCollection( Image::where('exhibition_id', $this->id)->get() ),
            'videos' => new VideoCollection( Video::where('exhibition_id', $this->id)->get() ),
            'time' => $this->created_at->format('d M Y'),
        ];
    }
}
