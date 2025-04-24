<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categorie;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommandeFactory extends Factory
{

    public function definition(): array
    {
        $faker = app(Faker::class);    
        return [
            'user_id' => $faker->numberBetween(1, 11), // Assuming you have 10 users
            'date' => $faker->date(),
            'prix' => $faker->randomFloat(2, 10, 1000), // Random price between 10 and 1000
        ];
    }
    
}
