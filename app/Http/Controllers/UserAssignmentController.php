<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAssignment; // Import the UserAssignment model
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Spatie\Permission\Traits\HasRoles; // Import the HasRoles trait
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Assignment;

class UserAssignmentController extends Controller 
{    
    use HasFactory, Notifiable, HasRoles;

    public function index() {
        /* Mario */
        $user = User::find(Auth::user()->id);
        /* Test om de boolean te checken van gebruiker: */
        //    dd($user->name);
        //    dd($user->hasRole('Student'));
        
        if ($user->hasRole('Student')) {
            $userassignments = UserAssignment::where('student_id', $user->id)->paginate(15);
            return view('userassignments.index', compact('userassignments'));
        }

        // if ($user->hasRole('Docent')) {
        //     $userassignments = UserAssignment::where('docent_id', $user->id)->paginate(15);
        //     return view('userassignments.create', compact('userassignments'));
        // }

        if ($user->hasRole('Beheerder', 'Auteur')) {
            $userassignments = UserAssignment::paginate(15);
        }
        
    }

    public function create() {
        // vindt de huidige user
        $user = User::find(Auth::user()->id);
        $students = User::role('Student')->get();
        dd($students);

        //check of de user een docent is
        if ($user->hasRole('Docent')) {
            $userassignments = UserAssignment::All();
            return view('userassignments.create', compact('userassignments'));
        }
        
    }

    public function store(Request $request) {
        /* Validate the form */
        $data = $request->validate([
            'student_id' => 'required',
            'docent_id' => 'required',
            'assignment_id' => 'required',
            // 'phase' => 'required|string|max:11',
        ]);

        /* Assign the student to the assignment */
        $userassignment = Userassignment::create([
            'student_id' => $request->student_id,
            'docent_id' => $request->docent_id ?? Auth::user()->id,
            'assignment_id' => $request->student_id,
            // 'crebo' => $data['crebo'],
        ]);

        /* Save the created object in variable userassignment */
        $userassignment->save();

        /* Redirect to the assignment overview page */
        return to_route('assignment.index')->with('success', 'Opdracht toegewezen!');
    }

    public function view($id) {
        $userassignment = UserAssignment::find($id);
    
        if (!$userassignment) {
            abort(404);
        }
    
        $assignment = $userassignment->assignment;
    
        return view('userassignments.view', compact('userassignment', 'assignment'));
    }
    
}
