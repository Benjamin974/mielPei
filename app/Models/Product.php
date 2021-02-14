<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'image', 'prix', 'id_user'];

    public function exploitations()
    {
        return $this->hasMany(Exploitation::class, 'id_product');
    }

    function livraison()
    {
        return $this->hasMany(Livraison::class, 'id_product');
    }

    function commandesHasProducts()
    {
        return $this->hasMany(CommandesProducts::class, 'id_product');
    }

    function producteur()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    
    function facturesHasProducts()
    {
        return $this->belongsToMany('App\Models\Facture', 'factures_has_products', 'id_commande', 'id_product');
    }
}
