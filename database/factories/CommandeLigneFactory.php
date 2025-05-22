<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\CommandeLigne;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CommandeLigne>
 */
class CommandeLigneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = app(Faker::class);
        $quantite = $faker->numberBetween(1, 10);
        $prix = $faker->randomFloat(2, 5, 99);

        return [
            'commande_id' => Commande::inRandomOrder()->first()?->id ?? Commande::factory(),
            'produit_id' => Produit::inRandomOrder()->first()?->id ?? Produit::factory(),
            'quantite' => $quantite,
            'prix_unitaire' => $prix,
            'total' => $quantite * $prix,
        ];

    }




    



}
