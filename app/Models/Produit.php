<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'prix',
        'image',
        'categorie_id',
    ];

    protected $casts = [
        'prix' => 'decimal:2',
    ];
    public function commandeslignes()
    {
        return $this->hasMany(CommandeLigne::class);
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
