<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'retamosorodriguezmarcoantonio@gmail.com')->exists()) {
            $user = User::create([
                'id' => 1,
                'name' => 'Marco Antonio',
                'last_name' => 'Retamoso Rodriguez ',
                'email' => 'retamosorodriguezmarcoantonio@gmail.com',
                'password' => Hash::make('12345678'),
            ]);
        }
        if (!User::where('email', 'rosycelarocarivero136@gmail.com')->exists()) {
            $user = User::create([
                'id' => 2,
                'name' => 'Rosycela',
                'last_name' => 'Roca Rivero',
                'email' => 'rosycelarocarivero136@gmail.com',
                'password' => Hash::make('12345678'),
            ]);
        }
    }
}
