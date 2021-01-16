<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiches extends Model
{
    use HasFactory;
    protected $table = 'fiches';
    protected $fillable = ['id_user', 'profession', 'content'];
    
    public function users()
    {
        return $this->belongsTo(User::class, 'id_role');
    }
}
