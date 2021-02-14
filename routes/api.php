<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommandesController;
use App\Http\Controllers\FacturesController;
use App\Http\Controllers\ProducteursController;
use App\Http\Controllers\ProductsController;
use App\Http\Middleware\CheckBanned;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/exploitations', [ProductsController::class, 'getExploitations']);
Route::middleware('auth:api')->get('/producteur/{id}', [ProductsController::class, 'getProducteur'])->where('id', "[0-9]+");
Route::middleware('auth:api')->get('/producteurs', [ProductsController::class, 'getProducteurs']);
Route::middleware('auth:api')->get('/products', [ProductsController::class, 'getProducts']);
Route::middleware('auth:api')->get('/popular-products', [ProductsController::class, 'popularProducts']);
Route::middleware('auth:api')->post('/commander', [CommandesController::class, 'commander']);
Route::middleware('auth:api')->get('/client/{id}/commandes', [CommandesController::class, 'getCommandes'])->where('id', "[0-9]+");
Route::get('/commande/{id}/products', [CommandesController::class, 'getProductsCommandes'])->where('id', '[0-9]+');
Route::post('/facture', [FacturesController::class, 'getFacture']);

Route::get('/producteurs/products/{id}', [ProducteursController::class, 'getProducts'])->where('id', "[0-9]+");
Route::middleware('auth:api')->post('/product/add-update', [ProducteursController::class, 'addUpdateProduct']);
Route::middleware('auth:api')->post('/producteurs/products/delete/{id}', [ProducteursController::class, 'deleteProduct'])->where('id', "[0-9]+");
Route::middleware('auth:api')->get('/producteur/fiche/{id}', [ProducteursController::class, 'getFiche'])->where('id', "[0-9]+");
Route::middleware('auth:api')->post('/producteur/fiche/update', [ProducteursController::class, 'updateFiche']);
Route::middleware('auth:api')->post('/producteur/product/livraison', [ProducteursController::class, 'addLivraison']);
Route::middleware('auth:api')->get('/producteur/product/livraison/{id}', [ProducteursController::class, 'getLivraison'])->where('id', "[0-9]+");
Route::get('/producteur/{id}/products/commande', [ProducteursController::class, 'getProductsCommande'])->where('id', "[0-9]+");

Route::middleware('auth:api')->get('/users', [AdminController::class, 'getUsers']);
Route::middleware('auth:api')->get('/roles', [AdminController::class, 'getRoles']);
Route::middleware('auth:api')->post('/user/{id}/update', [AdminController::class, 'updateUser'])->where('id', "[0-9]+");
Route::middleware('auth:api')->post('/user/{id}/suspendre', [AdminController::class, 'suspendre'])->where('id', "[0-9]+");
Route::middleware('auth:api')->post('/user/{id}/rajouter', [AdminController::class, 'rajouter'])->where('id', "[0-9]+");

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->get('logout', [AuthController::class, 'logout']);
