<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommandesProductsResource;
use App\Models\Address;
use App\Models\Commande;
use App\Models\CommandesProducts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;

class FacturesController extends Controller
{
    public function getFacture(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required',
                'client' => 'required'
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

        $commande = Commande::with(['commandesHasProducts'])->where('id', $validator['id'])->first();
        $commandesProducts = CommandesProducts::where('id_commande', $commande['id'])->get();
        $collectionCommandes = CommandesProductsResource::collection($commandesProducts);
        $facturation = Address::find($commande['id_billing_address']);
        $clientAddress = Address::find($commande['id_delivery_address']);
        $producteur = User::find($commande['id_user']);
        $client = User::find($validator['client']);
        $pdf = PDF::loadView('pdf.facture', compact("collectionCommandes", "commande", "facturation", "producteur", "client", "clientAddress"));
        return $pdf->stream();

    }
}
