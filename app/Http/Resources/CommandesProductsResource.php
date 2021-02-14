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
        $commande = new CommandesResource($this->commande);
        return [
            'id' => $this->id,
            'quantite' => $this->quantite,
            'commande' => $commande,
            'product' => $product,
            'created_at' => $this->created_at
        ];
    }
}
