<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;

class AssignmentController extends Controller
{


    public function index()
    {
        $assignments = Assignment::paginate(15);
        return view('assignments.index', compact('assignments'));
    }
    
    public function create()
    {
        return view('assignments.create');
    }

    public function store(Request $request)
    {
    
        $userid = auth()->user()->id;

        $request->validate([
            'title' => 'required',
            'deadline' => 'nullable',
            'description' => 'nullable',
        ]);
    
        // Create the assignment and capture the instance
        Assignment::create([
            'title' => $request->title,
            'deadline' => $request->deadline,
            'description' => $request->description,
            'author_id' => $userid,
        ]);

        return redirect()->route('assignments.index')
            ->with('success', 'Assignment created successfully.');
    }
    

    public function show(Assignment $assignment)
    {
        $assignments = Assignment::all(); // or fetch assignments as needed
        return view('assignments.show', compact('assignment'));
    }

    public function edit(Assignment $assignment)
    {
        return view('assignments.edit', compact('assignments'));
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
