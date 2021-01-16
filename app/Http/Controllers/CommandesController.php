<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Commande;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CommandesController extends Controller
{
    public function commander(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'commandeList' => 'required',
                'facturation' => 'required',
                'livraison' => 'required'
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();
        
        $livraison_name = $validator['livraison'];
        $facturation_name = $validator['facturation'];
        $commandeList = $validator['commandeList'];
        
     
        $livraison = $this->createAdresse($validator['livraison']);
        $facturation = $this->createAdresse($validator['facturation']);

        $dataLivraison = Address::where('name', $livraison_name['name'])->first();
        $dataFacturation = Address::where('name', $facturation_name['name'])->first();

        $commande = new Commande;
        $commande->id_user = 5;
        $commande->id_delivery_address = $dataLivraison->id;
        $commande->id_billing_address = $dataFacturation->id;
        $commande->save();
        foreach($commandeList as $_product) {
            $product = Product::find($_product['id']);
            $quantite = $_product['quantite'];
            $commande->commandesHasProducts()->attach($product, ['quantite' => $quantite]);
            $product->quantite = $product->quantite - $quantite;
            $product->save();
        }
        return $commande;

        
    }

    function createAdresse($_address)
    {
        $address =  new Address;
        $address->name = $_address['name'];
        $address->pays = $_address['pays'];
        $address->ville = $_address['ville'];
        $address->postal_code = $_address['postal_code'];
        $address->address = $_address['address'];
        $address->id_user = 5;
        $address->save();
    }
}
