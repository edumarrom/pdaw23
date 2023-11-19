<?php

namespace Database\Seeders;

use App\Models\Audience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AudienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Audience::create([
            'name' => 'Estudiante',
        ]);

        Audience::create([
            'name' => 'Trabajador',
        ]);

        Audience::create([
            'name' => 'Desempleado',
        ]);
    }
}
