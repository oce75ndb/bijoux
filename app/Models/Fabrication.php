<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabrication extends Model
{
    use HasFactory;
    protected $fillable = [
        'fabrication',
    ];
    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
