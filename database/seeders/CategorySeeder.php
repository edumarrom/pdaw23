<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Desarrollo web',
        ]);

        Category::create([
            'name' => 'Diseño gráfico',
        ]);

        Category::create([
            'name' => 'Marketing Digital',
        ]);
    }
}
