<?php

namespace App\Http\Resources\V1\User;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'id'   => $this->id,
            'avatar'   => $this->avatar,
            'name'   => $this->name,
            'family'   => $this->family,
            'phone_number'   => $this->phone_number,
            'i_acc'   => $this->i_acc,
            'f_acc'   => $this->f_acc,
            'address'   => $this->address,
            'desc'   => $this->desc,
            'email' => $this->email,
            'api_token' => $this->api_token,
            'time' => $this->created_at->format('d M Y'),
        ];
    }
}
