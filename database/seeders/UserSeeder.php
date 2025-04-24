<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create(); // Crée 10 utilisateurs aléatoires
        // Seeder pour les utilisateurs
        User::factory()->create([
            'name' => 'Bondon',
            'prenom' => 'Océane',
            'email' => 'oceanebondon30@gmail.com',
            'password' => bcrypt('Ilona2005.'), // Hasher le mot de passe
        ]);
    }
}
