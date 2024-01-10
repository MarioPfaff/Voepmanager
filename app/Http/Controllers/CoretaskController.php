<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\Workprocess;
use App\Models\Core_task;

class CoretaskController extends Controller
{
    /* View all core tasks */
    public function index() {
        $core_tasks = Core_task::all();
        return view('core_tasks.index', compact('core_tasks'));
    }

    /* edit functions */
    public function edit($id) {
        $core_task = Core_task::findOrFail($id);
        return view('core_tasks.edit', compact('core_task'));
    }

    public function update(Core_task $core_task, Request $request) {
        /* Validate the form */
        $data = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        /* Update the core task using data from the data variable */
        $core_task->update($data);

        /* Redirect to the core task index */
        return redirect()->route('core_tasks.index')->with('success', 'kerntaak succesvol bewerkt!')->with('success_timeout', true);
    }
    /* end edit functions */

    /* create functions */
    public function create() {
        return view('core_tasks.create');
    }

    public function store(Request $request) {
        /* Validate the form */
        $data = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        /* Create the core task */
        $core_task = Core_task::create([
            'name' => $data['name']
        ]);

        /* Save the created object in variable core_task */
        $core_task->save();

        /* Redirect to the core task overview page */
        return to_route('core_tasks.index')->with('success', 'kerntaak succesvol aangemaakt!');
    }
    /* end create functions */

    public function destroy($id) {
        /* Find the core task id using the passed id. */
        $core_task = Core_task::find($id);
        $workprocess = Workprocess::where('core_task_id', $id)->get();

        if ($workprocess->isNotEmpty()) {
            return to_route('core_tasks.index')->with('error', 'Deze kerntaak is gekoppeld aan 1 of meerdere werkprocessen. Pas die eerst aan. Anders kun je de kerntaak niet verwijderen.');
        }
        else {
            $core_task->delete();
            /* Redirect to the core task overview page */
            return to_route('core_tasks.index')->with('success', 'Kerntaak succesvol verwijderd!');
        }
    }
}
