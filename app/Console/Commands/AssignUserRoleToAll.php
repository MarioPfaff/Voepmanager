<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AssignUserRoleToAll extends Command
{
    protected $signature = 'assign:User';
    protected $description = 'Assign the role user to all users, unless they already have a role.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $role = Role::findByName('User');
        $users = User::whereDoesntHave('roles')->get();

        foreach ($users as $user) {
            $user->syncRoles($role);
        }

        $this->info('Standard user role assigned to all users. If a user already had a role, it was not changed.');
    }
}

