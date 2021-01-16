<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExploitationsResource;
use App\Http\Resources\ProductsResource;
use App\Http\Resources\UsersResource;
use App\Models\Exploitation;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function getExploitations()
    {
        $data = Exploitation::get();
        return ExploitationsResource::collection($data);
    }


    public function getProducteurs() {
        $data = User::where('id_role', 3)->get();
        return UsersResource::collection($data);
    }

    public function getProducteur($id) {
        $data = User::with('exploitations')->find($id);
        return $data;
    }

    public function getProducts() {
        $data = Product::get();

        return ProductsResource::collection($data);
    }
}
