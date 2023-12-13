<?php
 
namespace Database\Seeders;
 
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
 
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
 
 
        // Get the Beheerder role
        $beheerderRole = Role::where('name', 'Beheerder')->first();
 
        // Get all existing permission models
        $existingPermissions = Permission::all();
 
        // Sync all permissions to the Beheerder role
        $beheerderRole->syncPermissions($existingPermissions);
 
    }
}