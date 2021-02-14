<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user = new UsersResource($this->producteur);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'prix' => $this->prix,
            'quantite' => $this->quantite,
            'popularite' => $this->popularite,
            'producteur' => $user,

        ];
    }
}
