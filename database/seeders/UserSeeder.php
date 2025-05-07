<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create(); // Crée 10 utilisateurs aléatoires
        // Seeder pour les utilisateurs
        User::updateOrCreate(
            ['email' => 'oceanebondon30@gmail.com'], // critère de recherche
            [
                'name' => 'Bondon',
                'prenom' => 'Océane',
                'password' => Hash::make('motdepasse'),
                'email_verified_at' => now(),
                'telephone' => '0788888888',
                'adresse' => '1 rue de la paix',
                'code_postal' => '75000',
                'ville' => 'Paris',
                'pays' => 'France',
            ]
        );        
    }
}
