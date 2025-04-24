<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fabrication;
class FabricationSeeder extends Seeder
{
    public function run()
    {
        Fabrication::create(['fabrication' => 'Fabriqué à la main']);
        Fabrication::create(['fabrication' => 'Assemblage artisanal']);
        Fabrication::create(['fabrication' => 'Fabriqué en série']);

    }
}

