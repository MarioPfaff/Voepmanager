<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\Workprocess;
use App\Models\Core_task;
use App\Models\Assignment;

class WorkprocessController extends Controller
{
    /* View all workprocesses */ 
    public function index() {
        $workprocesses = Workprocess::with('coreTask')->get();
        $core_tasks = Core_task::all();
        return view('workprocesses.index', compact('workprocesses', 'core_tasks'));
    }

    /* edit functions */
    public function edit($id) {
        $workprocess = Workprocess::findOrFail($id);
        $core_tasks = Core_task::all();
        return view('workprocesses.edit', compact('workprocess', 'core_tasks'));
    }

    public function update(Workprocess $workprocess, Request $request) {
        /* Validate the form */
        $data = $request->validate([
            'workprocess_title' => 'required|string|max:255',
            'workprocess_number' => 'required|string|max:10',
            'core_task_id' => 'required',
            'crebo' => 'required|string|max:11',
        ]);

        /* Update the workprocess using data from the data variable */
        $workprocess->update($data);

        /* Redirect to the workprocess index */
        return redirect()->route('workprocesses.index')->with('success', 'Werkprocess succesvol bewerkt!')->with('success_timeout', true);
    }
    /* end edit functions */

    /* create functions */
    public function create() {
        $core_tasks = Core_task::all();
        return view('workprocesses.create', compact('core_tasks'));
    }

    public function store(Request $request) {
        /* Validate the form */
        $data = $request->validate([
            'workprocess_title' => 'required|string|max:255',
            'workprocess_number' => 'required|string|max:10',
            'core_task_id' => 'required',
            'crebo' => 'required|string|max:11',
        ]);

        /* Create the workprocess */
        $workprocess = Workprocess::create([
            'workprocess_title' => $data['workprocess_title'],
            'workprocess_number' => $data['workprocess_number'],
            'core_task_id' => $data['core_task_id'],
            'crebo' => $data['crebo'],
        ]);

        /* Save the created object in variable workprocess */
        $workprocess->save();

        /* Redirect to the workprocess overview page */
        return to_route('workprocesses.index')->with('success', 'Werkprocess succesvol aangemaakt!');
    }
    /* end create functions */

    public function destroy($id) {
        /* Find the workprocess id using the passed id. */
        $workprocess = Workprocess::find($id);
        $workprocess->delete();
        /* Redirect to the workprocess overview page */
        return to_route('workprocesses.index')->with('success', 'Werkprocess succesvol verwijderd!');
    }

    public function view($id) {
        $workprocesses = Workprocess::class::find($id);

        // Load only the assignments related to the current work process
        $assignments = Assignment::where('workprocess_id', $workprocesses->id)->get();
    
        return view('workprocesses.view', compact('workprocesses', 'assignments'));        
    }
}