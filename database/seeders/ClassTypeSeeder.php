<?php

namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassType::create([
            'name' => 'Yoga',
            'description' => fake()->text(),
            'minutes' => 60
        ]);
        ClassType::create([
            'name' => 'Dance Fitness',
            'description' => fake()->text(),
            'minutes' => 45
        ]);
        ClassType::create([
            'name' => 'Pilates',
            'description' => fake()->text(),
            'minutes' => 60
        ]);
        ClassType::create([
            'name' => 'Boxing',
            'description' => fake()->text(),
            'minutes' => 50
        ]);
    }
}
