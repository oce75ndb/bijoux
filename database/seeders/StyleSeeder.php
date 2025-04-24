<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorie;
use App\Models\Style;
class StyleSeeder extends Seeder
{
    public function run()
    {
        Style::create(['style' => 'Moderne']);
        Style::create(['style' => 'Vintage']);
        Style::create(['style' => 'Fantaisie']);
        Style::create(['style' => 'Classique']);

    }
}

