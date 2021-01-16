<?php

namespace App\Http\Controllers;

use App\Models\Fiches;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProducteursController extends Controller
{
    public function getProducts(Request $request, $id)
    {
        $products = User::with('producteursHasProducts')->where('id', $id)->first();
        return $products;
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

            $producteur = User::with(['producteursHasProducts'])->find($validator['id_user']);
            if (!$producteur) {
                return 'error';
            }

            $producteur->producteursHasProducts()->detach($product);
            $producteur->producteursHasProducts()->attach($product);
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
}
