<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\Workprocess;
use App\Models\Core_task;

class WorkprocessController extends Controller
{
    /* View all workprocesses */ 
    public function index() {
        $workprocesses = Workprocess::with('coreTask')->get();
        return view('workprocesses.index', compact('workprocesses'));
    }

    /* The edit button for all workprocesses */ 
    public function edit(Workprocess $workprocess) {
        $workprocess = Workprocess::all();
        return view('workprocesses.edit', compact('workprocess'));
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
        return to_route('workprocesses.index')->with('success', 'workprocess updated successfully!');
    }

    public function destroy($id) {

        /* Find the workprocess id using the passed id. */
        $workprocess = Workprocess::find($id);
        $workprocess->delete();
        return to_route('workprocesses.index')->with('success', 'workprocess deleted successfully!');
    }
}
