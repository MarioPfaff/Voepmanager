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
 
        /* Import all roles. Add if there are more soon. */
        DB::table('roles')->insert([
            'name' => 'Beheerder',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
 
        DB::table('roles')->insert([
            'name' => 'Docent',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
 
        DB::table('roles')->insert([
            'name' => 'Slber',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
 
        DB::table('roles')->insert([
            'name' => 'Student',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
 
        DB::table('roles')->insert([
            'name' => 'Stagebegeleider',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
 
        DB::table('roles')->insert([
            'name' => 'Auteur',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
 
        /* Import all permissions. Add if there are more soon. */

        /* Toestemmingen: Gebruikers */

        DB::table('permissions')->insert([
            'id' => '1',
            'name' => 'user.view',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
 
        DB::table('permissions')->insert([
            'id' => '2',
            'name' => 'user.create',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
 
        DB::table('permissions')->insert([
            'id' => '3',
            'name' => 'user.edit',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
 
        DB::table('permissions')->insert([
            'id' => '4',
            'name' => 'user.delete',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
 
        /* Toestemmingen: Rollen */

        DB::table('permissions')->insert([
            'id' => '5',
            'name' => 'role.view',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
 
        DB::table('permissions')->insert([
            'id' => '6',
            'name' => 'role.edit',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
 
        DB::table('permissions')->insert([
            'id' => '7',
            'name' => 'role.delete',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
 
        DB::table('permissions')->insert([
            'id' => '8',
            'name' => 'role.create',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        /* Toestemmingen: Werkprocessen */
 
        DB::table('permissions')->insert([
            'id' => '9',
            'name' => 'workprocess.view',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('permissions')->insert([
            'id' => '10',
            'name' => 'workprocess.edit',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('permissions')->insert([
            'id' => '11',
            'name' => 'workprocess.delete',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('permissions')->insert([
            'id' => '12',
            'name' => 'workprocess.create',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        /* Toestemmingen: Opdrachten */

        DB::table('permissions')->insert([
            'id' => '13',
            'name' => 'assignment.create',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('permissions')->insert([
            'id' => '14',
            'name' => 'assignment.edit',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('permissions')->insert([
            'id' => '15',
            'name' => 'assignment.delete',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('permissions')->insert([
            'id' => '16',
            'name' => 'assignment.view',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
 
 
        // Get the Beheerder role
        $beheerderRole = Role::where('name', 'Beheerder')->first();
 
        // Get all existing permission models
        $existingPermissions = Permission::all();
 
        // Sync all permissions to the Beheerder role
        $beheerderRole->syncPermissions($existingPermissions);
 
    }
}