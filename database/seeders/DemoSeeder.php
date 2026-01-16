<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
        'name' => 'Admin',
        'email' => 'admin@test.com',
        'role' => 'admin',
        'password' => bcrypt('admin123')
        ]);

        $apprenant = User::create([
        'name' => 'Mouhamed Aidara',
        'email' => 'apprenant@test.com',
        'role' => 'apprenant',
        'password' => bcrypt('password')
        ]);


    }
}
