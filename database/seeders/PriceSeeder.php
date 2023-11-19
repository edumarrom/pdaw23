<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Price::create([
            'name' => 'Gratis',
            'price' => 0,
        ]);

        Price::create([
            'name' => 'Básico',
            'price' => 9.99,
        ]);

        Price::create([
            'name' => 'Intermedio',
            'price' => 19.99,
        ]);

        Price::create([
            'name' => 'Avanzado',
            'price' => 49.99,
        ]);
    }
}
