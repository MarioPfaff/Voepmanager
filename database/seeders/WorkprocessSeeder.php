<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkprocessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('workprocesses')->insert([
            'crebo' => '25604',
            'core_task_id' => '1',
            'workprocess_number' => 'B1-K1-W1',
            'workprocess_title' => 'Plant werkzaamheden en bewaakt de voortgang',
        ]);

        DB::table('workprocesses')->insert([
            'crebo' => '25604',
            'core_task_id' => '1',
            'workprocess_number' => 'B1-K1-W2',
            'workprocess_title' => 'Ontwerpt software',
        ]);

        DB::table('workprocesses')->insert([
            'crebo' => '25604',
            'core_task_id' => '1',
            'workprocess_number' => 'B1-K1-W3',
            'workprocess_title' => 'Realiseert (onderdelen van) software',
        ]);

        DB::table('workprocesses')->insert([
            'crebo' => '25604',
            'core_task_id' => '1',
            'workprocess_number' => 'B1-K1-W4',
            'workprocess_title' => 'Test software',
        ]);

        DB::table('workprocesses')->insert([
            'crebo' => '25604',
            'core_task_id' => '1',
            'workprocess_number' => 'B1-K1-W5',
            'workprocess_title' => 'Doet verbetervoorstellen voor de software',
        ]);

        DB::table('workprocesses')->insert([
            'crebo' => '25604',
            'core_task_id' => '2',
            'workprocess_number' => 'B1-K2-W1',
            'workprocess_title' => 'Voert overleg',
        ]);

        DB::table('workprocesses')->insert([
            'crebo' => '25604',
            'core_task_id' => '2',
            'workprocess_number' => 'B1-K2-W2',
            'workprocess_title' => 'Presenteert het opgeleverde werk',
        ]);

        DB::table('workprocesses')->insert([
            'crebo' => '25604',
            'core_task_id' => '2',
            'workprocess_number' => 'B1-K2-W3',
            'workprocess_title' => 'Reflecteert op het werk',
        ]);
    }
}
