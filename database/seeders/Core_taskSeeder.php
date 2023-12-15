<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Core_taskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('core_tasks')->insert([
            'name' => 'Realiseert software',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('core_tasks')->insert([
            'name' => 'Werkt in een ontwikkelteam',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
