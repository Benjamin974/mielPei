<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandesProducts extends Model
{
    use HasFactory;
    protected $table = 'commandes_has_products';
    protected $fillable = ['quantite', 'id_commande', 'id_product'];
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
