<?php

namespace App\Http\Resources\V1\Logo;

use Illuminate\Http\Resources\Json\JsonResource;

class Logo extends JsonResource
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
            'logo' => $this->logo,
            'writer' => $this->title,
            'sentence' => $this->desc
        ];
    }
}
