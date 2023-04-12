<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Shruti',
            'email' => 'shruti@example.com'
        ]);

        User::factory()->create([
            'name' => 'Taylor',
            'email' => 'taylor@example.com'
        ]);

        User::factory()->create([
            'name' => 'John',
            'email' => 'john@example.com',
            'role' => 'instructor'
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin'
        ]);

        User::factory()->count(10)->create();

        User::factory()->count(10)->create([
            'role' => 'instructor'
        ]);
    }
}
