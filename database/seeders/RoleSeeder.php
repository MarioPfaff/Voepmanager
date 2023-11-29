<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'name' => 'Beheerder',
            'guard_name' => 'web',
        ]);

        DB::table('roles')->insert([
            'name' => 'Docent',
            'guard_name' => 'web',
        ]);

        DB::table('roles')->insert([
            'name' => 'Slber',
            'guard_name' => 'web',
        ]);

        DB::table('roles')->insert([
            'name' => 'Student',
            'guard_name' => 'web',
        ]);

        DB::table('roles')->insert([
            'name' => 'Stagebegeleider',
            'guard_name' => 'web',
        ]);

        DB::table('roles')->insert([
            'name' => 'Auteur',
            'guard_name' => 'web',
        ]);
    }
}
