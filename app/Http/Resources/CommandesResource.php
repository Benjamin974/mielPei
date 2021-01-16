<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommandesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user = new UsersResource($this->user);
        $delivery = new AddressResource($this->delivery);
        $billing = new AddressResource($this->billing);

        return [
            'id' => $this->id,
            'user' => $user,
            'delivery' => $delivery,
            'billing' => $billing,
        ];
    }
}