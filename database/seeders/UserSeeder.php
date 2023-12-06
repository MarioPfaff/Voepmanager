<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $user = User::create([
        'name' => 'Tomas',
        'email' => 'admins@admins.com',
        'password' => bcrypt('12345678')
    ]);
    
    $user->assignRole('Beheerder');

    }
}
