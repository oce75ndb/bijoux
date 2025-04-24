<?php

namespace Database\Seeders;

use Illuminate\Console\Command;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Commande;
use App\Models\Categorie;
use App\Models\CommandeLigne;
class CommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Commande::factory()
        ->count(20)
        ->create()
        ->each(function ($commande) {
            CommandeLigne::factory()
                ->count(rand(1, 3)) // 👈 nombre aléatoire de lignes
                ->for($commande)    // associe à la commande actuelle
                ->create();
        });

    }
}
