<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;
    protected $table = 'livraisons';
    protected $fillable = ['id_product', 'id_commande', 'id_status'];

    function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
    function commande()
    {
        return $this->belongsTo(Commande::class, 'id_commande');
    }
    function statusLivraison()
    {
        return $this->belongsTo(StatusLivraison::class, 'id_status');
    }

}
