<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\Workprocess;

class WorkprocessController extends Controller
{
    /* View all workprocesses */ 
    public function index() {
        $workprocesses = Workprocess::all();
        return view('workprocesses.index', compact('workprocesses'));        
    }

    /* The edit button for all workprocesses */ 
    public function edit(Workprocess $workprocess) {
        $workprocess = Workprocess::all();
        return view('workprocesses.edit', compact('workprocesses'));
    }

    public function update(Workprocess $workprocess, Request $request) {
        /* Validate the form */
        $data = $request->validate([
            'workprocess_title' => 'required|string|unique:max:50',

            'workprocess_number' => 'required|integer|unique:max:10',

            'core_task' => 'required|string|unique:max:50',
            'crebo' => 'required|integer|unique:max:10',
        ]);

        /* Update the workprocess using data from the data variable */
        $workprocess->update($data);
        // $user->syncRoles($data['roles']);

        /* Redirect to the workprocess index */
        return to_route('workporcesses.index')->with('success', 'workprocess updated successfully!');
    }
}
