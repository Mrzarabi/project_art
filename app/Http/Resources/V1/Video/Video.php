<?php

namespace App\Http\Resources\V1\Video;

use Illuminate\Http\Resources\Json\JsonResource;

class Video extends JsonResource
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
            'videoUrl' => $this->videoUrl,
            'time' => $this->created_at->format('d M Y - H:m'),
        ];
    }
}
