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
        $admin = User::create([
            'name' => 'Eduardo Martínez Romero',
            'email' => 'edu@dabaliu.test',
            'password' => bcrypt(env('MY_PASSWORD')),
        ]);

        $admin->assignRole('admin');

        User::factory(99)->create();
    }
}
