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
        // Seeder pour les utilisateurs
        User::factory()->create([
            'name' => 'Test',
            'prenom' => 'User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'), // Hasher le mot de passe
        ]);

        // Appel des seeders pour les catégories et les produits
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
