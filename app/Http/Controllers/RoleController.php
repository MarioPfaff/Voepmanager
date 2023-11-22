<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{

public function index() {
    $roles = Role::all();
    return view('roles.index', compact('roles'));
}

public function edit(Role $role, Permission $permission) {
    $role = Role::findById($role->id, 'web');
    $permissions = Permission::get();
    return view('roles.edit', compact('role', 'permissions'));
}

public function update(Request $request, Role  $role){
    $request->validate([
        'name' => 'required',
        'permissions' => 'nullable|array|exists:permissions,id',
    ]);

    $role = Role::findById($role->id, 'web');

    $permissions = $request->except(['_token', '_method', 'name']);
    $role->name = $request->name;
    
    $role->save();
    $role->syncPermissions(array_keys($permissions));

    return redirect()->route('roles.index')->with('success', 'Role updated successfully!');
}


}
