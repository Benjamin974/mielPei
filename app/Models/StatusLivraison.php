<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusLivraison extends Model
{
    use HasFactory;
    protected $table = 'status_livraison';
    protected $fillable = ['status'];
}
