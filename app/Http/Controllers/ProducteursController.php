<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommandesProductsResource;
use App\Http\Resources\LivraisonResource;
use App\Http\Resources\ProductsResource;
use App\Models\Commande;
use App\Models\CommandesProducts;
use App\Models\Fiches;
use App\Models\Livraison;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProducteursController extends Controller
{
    public function getProducts(Request $request, $id)
    {
        $products = User::with(['products' => function ($query) {
            return $query->orderBy('popularite', 'DESC')->paginate(4);
        }])->where('id', $id)->first();
        return ProductsResource::collection($products->products);
    }

    public function getFiche($id)
    {
        $products = Fiches::where('id_user', $id)->first();
        return $products;
    }

    public function updateFiche(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'profession' => 'required',
                'content' => 'required',
                'id_user' => 'required',
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

        $fiche = Fiches::find($validator['id_user']);
        $fiche->profession = $validator['profession'];
        $fiche->content = $validator['content'];
        $fiche->save();

        return $fiche;
    }

    public function addUpdateProduct(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'prix' => 'required',
                'quantite' => 'required',
                'id_user' => 'required',
                'id' => ''
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();


        $product = Product::find($validator['id']);


        if (!$product) {
            $product = new Product;
        } else {
            $product = $product;
        }

        if (isset($product)) {

            $product->name = $validator['name'];
            $product->prix = $validator['prix'];
            $product->quantite = $validator['quantite'];
            $product->id_user = $validator['id_user'];
            $img = $request->get('image');

            if ($product->image != $img) {
                $exploded = explode(",", $img);
                if (str::contains($exploded[0], 'gif')) {
                    $ext = 'gif';
                } else if (str::contains($exploded[0], 'png')) {
                    $ext = 'png';
                } else {
                    $ext = 'jpg';
                }

                if (empty($ext)) {
                    return 'error';
                }

                $decode = base64_decode($exploded[1]);

                $filename = str::random() . "." . $ext;

                $path = public_path() . "/storage/images/" . $filename;


                if (file_put_contents($path, $decode)) {
                    $product->image = "/storage/images/" . $filename;
                }
            }




            $product->save();

            return $product;
        }
    }

    public function deleteProduct(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_user' => 'required',
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

        $producteur = User::with(['producteursHasProducts'])->find($validator['id_user']);
        if (!$producteur) {
            return 'error';
        }

        $product = Product::where('id', '=', $id)->first();
        $producteur->producteursHasProducts()->detach($product);
        $product->delete();
        if ($product) {
            return "ok le produit a été supprimé";
        } else {
            return 'erreur';
        }
    }


    public function getProductsCommande($id)
    {
        $products = Product::where('id_user', $id)->with(['commandesHasProducts' => function ($query) use ($id) {
            $query->with(['product', 'commande']);
        }])->get();

        return $products;
    }

    public function addLivraison(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_product' => 'required',
                'id_commande' => 'required',
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

        $livraison = new Livraison();
        $livraison->id_product = $validator['id_product'];
        $livraison->id_commande = $validator['id_commande'];
        $livraison->id_status = 2;
        $livraison->save();

        return new LivraisonResource($livraison);
    }

    public function getLivraison(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_commande' => 'required',
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

            $livraison = Livraison::where('id_product', $id)->where('id_commande', $validator['id_commande'])->first();
            if($livraison) {
                return new LivraisonResource($livraison);
            } else {
                return response()->json(['message' => 'toto']);
            }
    }
}
