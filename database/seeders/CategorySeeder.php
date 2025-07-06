<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!\App\Models\Category::where('name', 'POR HACER')->exists()) {
            $category = \App\Models\Category::create([
                'id' => 1,
                'name' => 'POR HACER',
            ]);
        }
        if (!\App\Models\Category::where('name', 'EN CURSO')->exists()) {
            $category = \App\Models\Category::create([
                'id' => 2,
                'name' => 'EN CURSO',
            ]);
        }
        if (!\App\Models\Category::where('name', 'EN REVISION')->exists()) {
            $category = \App\Models\Category::create([
                'id' => 3,
                'name' => 'EN REVISION',
            ]);
        }
        if (!\App\Models\Category::where('name', 'LISTO')->exists()) {
            $category = \App\Models\Category::create([
                'id' => 4,
                'name' => 'LISTO',
            ]);
        }
    }
}
