<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Storage::deleteDirectory('courses');
        Storage::makeDirectory('courses');

        $this->call(UserSeeder::class);

        $this->call(CategorySeeder::class);

        $this->call(LevelSeeder::class);

        $this->call(PriceSeeder::class);

        $this->call(PlatformSeeder::class);

        $this->call(CourseSeeder::class);
    }
}
