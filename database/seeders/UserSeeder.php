<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Edu Martínez Romero',
            'email' => 'edu@dabaliu.test',
            'password' => bcrypt(env('MY_PASSWORD')),
        ]);

        User::factory(99)->create();
    }
}
