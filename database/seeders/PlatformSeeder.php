<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Platform::create([
            'name' => 'Youtube',
        ]);

        Platform::create([
            'name' => 'Vimeo',
        ]);
    }
}
