<?php

namespace Database\Seeders;

use App\Models\Gato;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
           'name' => 'fernando',
           'email' => 'fernando.asilva@pucpr.br'
        ]);

        User::factory(10)->create();

        Gato::factory(10)->create();
    }
}
