<?php

namespace App\Http\Resources\V1\Event;

use Illuminate\Http\Resources\Json\JsonResource;

class Event extends JsonResource
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
            'image' => $this->image,
            'title' => $this->title,
            'body' => $this->body,
            'i_link' => $this->i_link,
            'f_link' => $this->f_link,
            'date' => $this->date,
            'address' => $this->address,
            'time' => $this->created_at->format('d M Y'),
        ];
    }
}
