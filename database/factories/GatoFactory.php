<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GatoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => fake()->firstName(),
            'idade' => fake()->numberBetween(1,20),
            'raca' => fake()->randomElement(['siames', 'laranja', 'vira-lata', 'bombaim', 'cinza']),
            'peso' => fake()->numberBetween(1,15),
            'sexo' => fake()->randomElement(['m', 'f']),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
