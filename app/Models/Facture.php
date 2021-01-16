<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $table = 'factures';
    protected $fillable = ['name'];
    
    function facturesHasProducts()
    {
        return $this->belongsToMany('App\Models\Product', 'factures_has_products', 'id_commande', 'id_product');
    }
}
