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
 
    $beheerder = User::create([
        'name' => 'Admin',
        'email' => 'beheerder@rocrivor.com',
        'password' => bcrypt('12345678')
    ]);
 
    $beheerder->assignRole('Beheerder');
 
    $docent = User::create([
        'name' => 'Docent',
        'email' => 'docent@rocrivor.nl',
        'password' => bcrypt('12345678'),
    ]);
 
    $docent->assignRole('Docent');
 
    $slber = User::create([
        'name' => 'Slber',
        'email' => 'slber@rocrivor.nl',
        'password' => bcrypt('12345678'),
    ]);
 
    $slber->assignRole('Slber');
 
    $student = User::create([
        'name' => 'Student',
        'email' => 'student@rocrivor.nl',
        'password' => bcrypt('12345678'),
    ]);
 
    $student->assignRole('Student');
 
    $stagebegeleider = User::create([
        'name' => 'Stagebegeleider',
        'email' => 'stagebegeleider@rocrivor.nl',
        'password' => bcrypt('12345678'),
    ]);
 
    $stagebegeleider->assignRole('Stagebegeleider');
 
    $auteur = User::create([
        'name' => 'Auteur',
        'email' => 'auteur@rocrivor.nl',
        'password' => bcrypt('12345678'),
    ]);
 
    $auteur->assignRole('Auteur');
 
 
 
    }
}