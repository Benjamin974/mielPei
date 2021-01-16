<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommandesProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $product = new ProductsResource($this->product);

        return [
            'id' => $this->id,
            'quantite' => $this->quantite,
            'id_commande' => $this->id_commande,
            'product' => $product,
        ];
    }
}
