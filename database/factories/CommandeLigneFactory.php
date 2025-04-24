<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Commande;
use App\Models\Produit;
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
        return [
            'commande_id' => Commande::inRandomOrder()->first()?->id ?? Commande::factory(),
            'produit_id' => Produit::inRandomOrder()->first()?->id ?? Produit::factory(),
            'quantite' => $quantite = $faker->numberBetween(1, 10),
            'prix_unitaire' => $prix = $faker->randomFloat(2, 5, 200),
            'total' => fn(array $attributes) => $attributes['quantite'] * $attributes['prix_unitaire'],
        ];
    }




    



}
