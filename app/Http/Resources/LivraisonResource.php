<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LivraisonResource extends JsonResource
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
        $status = new StatusLivraisonResource($this->statusLivraison);

        return [
            'id' => $this->id,
            'product' => $product,
            'commande' => $commande,
            'status' => $status,

        ];
    }
}
