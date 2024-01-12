<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Workprocess;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::paginate(15);
        return view('assignments.index', compact('assignments'));
    }
    
    public function create()
    {
        $workprocesses = Workprocess::all();
        return view('assignments.create', compact('workprocesses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'deadline' => 'nullable|date',
            'workprocess_id' => 'required|integer',
            'author_id' => 'required|integer',
            'description' => 'nullable',
        ]);
    
        Assignment::create([
            'title' => $request->title,
            'deadline' => $request->deadline,
            'description' => $request->description,
            'author_id' => $request->author_id ?? Auth::user()->id,
            'workprocess_id' => $request->workprocess_id,
            'description' => $request->input('assignment-trixFields')['description'],
        ]);
    
        return redirect()->route('assignments.index')
            ->with('success', 'Assignment created successfully.');
    }

    public function show(Assignment $assignment)
    {
        $assignments = Assignment::all(); 
        return view('assignments.show', compact('assignment'));
    }

    public function edit(Assignment $assignment)
    {
        $workprocesses = Workprocess::all();
        $assignments = Assignment::all(); 

        return view('assignments.edit', compact('workprocesses', 'assignment'));
    }

    public function update(Request $request, Assignment $assignment)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deadline' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        $assignment->update($request->all());

        return redirect()->route('assignments.index')
            ->with('success', 'Assignment updated successfully');
    }

    public function destroy(Assignment $assignment)
    {
        $assignment->delete();

        return redirect()->route('assignments.index')
            ->with('success', 'Assignment deleted successfully');
    }
}
