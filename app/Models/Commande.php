<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $table = 'commandes';
    protected $fillable = ['id_user', 'id_delivery_address', 'id_billing_address'];

    function commandesHasProducts()
    {
        return $this->belongsToMany('App\Models\Product', 'commandes_has_products', 'id_commande', 'id_product');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    function livraison()
    {
        return $this->hasMany(Livraison::class, 'id_commande');
    }

    public function deliveryAddress()
    {
        return $this->belongsTo(Address::class, 'id_delivery_address');
    }
    
    public function billingAddress()
    {
        return $this->belongsTo(Address::class, 'id_billing_address');
    }
}
