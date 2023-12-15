<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{    
    public function index() {

        $users = User::paginate(15);
        return view('users.index', compact('users'));        
    }

    public function edit(User $user) {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(User $user, Request $request) {
        /* Validate the form */
        $data = $request->validate([
            'name' => 'required|string|max:255',

            /* Only says that the user's e-mail is already taken if it isn't taken by the current user. */
            'email' => 'required|email|unique:users,email,' . $user->id,

            'password' => 'nullable|string|min:8',
        ]);

        /* Checker for the password */
        if (empty($data['password'])) {
            unset($data['password']);
        }

        /* */
        elseif (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        /* End checker for the password */

        /* Update the user using data from the data variable */
        $user->update($data);
        $user->syncRoles($data['roles']);

        /* Redirect to the user index */
        return to_route('users.index')->with('success', 'User updated successfully!');
    }

    public function create() {
        return view('users/create');
    }

    public function store(Request $request) {
        /* Validate the form */
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',

        ]);

        /* Hash the password */
        $data['password'] = Hash::make($data['password']);

        /* Create the user */
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password'=> $data['password'],
        ]);

        /* Save the created object in variable user */
        $user->save();

        /* Redirect to the last page in the user's view */
        $paginator = User::paginate(15);
        return redirect('users/?page=' . $paginator->lastPage())->with('success', 'User created successfully!');
    }

    public function destroy($id) {

        /* Find the user id using the passed id. */
        $user = User::find($id);

        /* Check if the id of the form is equal to the authorized user. */
        if($user->id == auth()->user()->id) {
            return redirect()->back()->with('error', 'Sorry! You cannot delete yourself!');
        }

        /* Else we delete the user. */
        else {
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully!');
        }

    }
}