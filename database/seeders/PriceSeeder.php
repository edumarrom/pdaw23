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
            'value' => 0,
        ]);

        Price::create([
            'name' => 'Básico',
            'value' => 9.99,
        ]);

        Price::create([
            'name' => 'Intermedio',
            'value' => 19.99,
        ]);

        Price::create([
            'name' => 'Avanzado',
            'value' => 49.99,
        ]);
    }
}
