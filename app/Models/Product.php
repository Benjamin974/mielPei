<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'image', 'prix'];

    public function exploitations()
    {
        return $this->hasMany(Exploitation::class, 'id_product');
    }

    function commandesHasProducts()
    {
        return $this->belongsToMany('App\Models\Commande', 'commandes_has_products', 'id_commande', 'id_product');
    }

    function producteursHasProducts()
    {
        return $this->belongsToMany('App\Models\User', 'producteurs_has_products', 'id_user', 'id_product');
    }
    
    function facturesHasProducts()
    {
        return $this->belongsToMany('App\Models\Facture', 'factures_has_products', 'id_commande', 'id_product');
    }
}
