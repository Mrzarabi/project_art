<?php

namespace App\Http\Resources\V1\Praised;

use App\Http\Resources\V1\Image\ImageCollection;
use App\Models\Image;
use Illuminate\Http\Resources\Json\JsonResource;

class Praised extends JsonResource
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
            's_link' => $this->s_link,
            'date' => $this->date ? $this->date->format('d M Y') : null,
            'images'   => new ImageCollection( Image::where('exhibition_id', $this->id)->get() ),
        ];
    }
}
