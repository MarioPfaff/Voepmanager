<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('assignments')->insert([
            'title' => 'Logboek Forensics',
            'description' => '
            Houd hier je logboek van je activiteiten bij.

            Push elke week de code naar een private repo.
            
            Geef je docent toestemming om erin te kijken.
            
            Zet ook de link naar de repo hierin.
            
            Gebruik het volgende format: datum – wat heb ik gedaan – wat heb ik geleerd – tot waar ben ik gekomen
            ',
            'status' => 'Open',
        ]);

        DB::table('assignments')->insert([
            'title' => 'Maak de cursus Learning the OWASP Top 10',
            'description' => '
            Maak de cursus Learning the OWASP Top 10 van Caroline Wong  op LinkedIn Learning.

            ( https://www.linkedin.com/learning/learning-the-owasp-top-10-9364599/ )

            Lever hier je certificaat in.
            ',
            'status' => 'Open',
        ]);

        DB::table('assignments')->insert([
            'title' => 'Ontwerp Steam',
            'description' => '
            Maak een ontwerp voor de case Steam.

            Houd daarbij rekening met de owasp top 10 en de user stories.

            Bedenk ook twee abuse cases

            Deze opdracht kun je gebruiken voor je VOEP (opdracht 4)

            Inleveren: Ontwerpdocument (Hoofdstuk 3 van de projectwijzer)
            ',
            'status' => 'Gesloten',
        ]);
    }
}
