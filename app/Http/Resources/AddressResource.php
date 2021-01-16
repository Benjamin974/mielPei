<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
        
        return [
            'id' => $this->id,
            'name' => $this->name,
            'pays' => $this->pays,
            'ville' => $this->ville,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'user' => $user,
        ];
    }
}
