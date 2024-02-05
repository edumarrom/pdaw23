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
            'name' => 'UI/UX',
        ]);

        Category::create([
            'name' => 'Lenguajes de programación',
        ]);

        Category::create([
            'name' => 'Bases de datos',
        ]);

        Category::create([
            'name' => 'Marketing Digital',
        ]);
    }
}
