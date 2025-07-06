<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!\App\Models\Type::where('name', 'HISTORIA')->exists()) {
            $category = \App\Models\Type::create([
                'id' => 1,
                'name' => 'HISTORIA',
            ]);
        }
        if (!\App\Models\Type::where('name', 'BUG')->exists()) {
            $category = \App\Models\Type::create([
                'id' => 2,
                'name' => 'BUG',
            ]);
        }
        if (!\App\Models\Type::where('name', 'TAREA')->exists()) {
            $category = \App\Models\Type::create([
                'id' => 3,
                'name' => 'TAREA',
            ]);
        }
    }
}
