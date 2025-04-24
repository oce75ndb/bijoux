<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Appel des seeders pour les catégories et les produits
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            StyleSeeder::class,            
            MateriauSeeder::class,
            FabricationSeeder::class,
            ProductSeeder::class,
            CommandeSeeder::class,
        ]);
    }
}
