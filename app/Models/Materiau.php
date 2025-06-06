<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiau extends Model
{
    use HasFactory;
    protected $fillable = [
        'materiau',
    ];
    protected $table = 'materiaux';
    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
