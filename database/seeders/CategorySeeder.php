<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Categorie::create(['categorie' => 'Colliers']);
        Categorie::create(['categorie' => 'Bracelets']);
        Categorie::create(['categorie' => 'Boucles d\'oreilles']);
        Categorie::create(['categorie' => 'Bagues']);

    }
}

