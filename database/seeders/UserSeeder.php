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
        $admin = User::factory()->create([
            'name' => 'Eduardo Martínez Romero',
            'email' => 'edu@dabaliu.test',
            'password' => bcrypt(env('MY_PASSWORD')),
        ]);

        $admin->assignRole('admin');
        $admin->assignRole('teacher');

        $teachers = User::factory(99)->create();

        $teachersCount = 0;
        while ($teachersCount < 14) {
            foreach ($teachers as $teacher) {
                if (fake()->randomElement(['0', '0', '0', '0', '1'])) {
                    $teacher->assignRole('teacher');
                    $teachersCount++;
                    if ($teachersCount >= 13) {
                        break;
                    }
                }
            }
        }
    }
}
