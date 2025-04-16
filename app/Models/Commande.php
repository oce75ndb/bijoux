<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'prenom',
        'nom',
        'email',
        'adresse',
        'ville',
        'code_postal',
        'total',
    ];

    public function lignes()
    {
        return $this->hasMany(Commandeligne::class);
    }
}
