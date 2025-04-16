<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commandeligne extends Model
{
    use HasFactory;

    protected $table = 'commandeslignes';

    protected $fillable = [
        'commande_id',
        'produit_id',
        'quantite',
        'prix',
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

}
