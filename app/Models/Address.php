<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'address';
    protected $fillable = ['name', 'pays', 'ville', 'address', 'postal_code', 'id_user'];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function deliveryAddress()
    {
        return $this->hasMany(Address::class, 'id_delivery_address');
    }
    
    public function billingAddress()
    {
        return $this->hasMany(Address::class, 'id_billing_address');
    }
}
