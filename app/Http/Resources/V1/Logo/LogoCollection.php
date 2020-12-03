<?php

namespace App\Http\Resources\V1\Logo;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LogoCollection extends ResourceCollection
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
            'data' => $this->collection->map(function($item) {
                return [
                    'id' => $item->id,
                    'logo' => $item->logo,
                    'writer' => $item->title,
                    'sentence' => $item->desc
                ];
            })
        ];
    }
}
