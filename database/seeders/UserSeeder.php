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
 
    $beheerderMario = User::create([
        'name' => 'Mario Pfaff',
        'email' => 'm.pfaff@roc.beheerder.nl',
        'password' => bcrypt('12345678'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
 
    $beheerderMario->assignRole('Beheerder');

    $beheerderTomas = User::create([
        'name' => 'Tomas van Westen',
        'email' => 't.vanwesten@roc.beheerder.nl',
        'password' => bcrypt('12345678'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
 
    $beheerderTomas->assignRole('Beheerder');
 
    $docentHerbert = User::create([
        'name' => 'Herbert Rietman',
        'email' => 'h.rietman@roc.docent.nl',
        'password' => bcrypt('12345678'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
 
    $docentHerbert->assignRole('Docent');

    $docentHanneke = User::create([
        'name' => 'Hanneke Kool',
        'email' => 'h.kool@roc.docent.nl',
        'password' => bcrypt('12345678'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
 
    $docentHanneke->assignRole('Docent');
 
    $slberHanneke = User::create([
        'name' => 'Hanneke Kool',
        'email' => 'h.kool@roc.slber.nl',
        'password' => bcrypt('12345678'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
 
    $slberHanneke->assignRole('Slber');
 
    $studentMario = User::create([
        'name' => 'Mario Pfaff',
        'email' => 'm.pfaff@roc.student.nl',
        'password' => bcrypt('12345678'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
 
    $studentMario->assignRole('Student');

    $studentTomas = User::create([
        'name' => 'Tomas van Westen',
        'email' => 't.vanwesten@roc.student.nl',
        'password' => bcrypt('12345678'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
 
    $studentTomas->assignRole('Student');
 
    $stagebegeleiderErik = User::create([
        'name' => 'Erik Drent',
        'email' => 'e.drent@roc.stagebegeleider.nl',
        'password' => bcrypt('12345678'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
 
    $stagebegeleiderErik->assignRole('Stagebegeleider');
 
    $auteurHanneke = User::create([
        'name' => 'Hanneke Kool',
        'email' => 'h.kool@roc.auteur.nl',
        'password' => bcrypt('12345678'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
 
    $auteurHanneke->assignRole('Auteur');
 
    }
}