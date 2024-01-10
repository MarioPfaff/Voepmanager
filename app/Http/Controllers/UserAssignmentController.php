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
        /* Test om de boolean te checken van gebruiker:
           dd($user->hasRole('Student')); */

        if ($user->hasRole('Student')) {
            $userassignments = UserAssignment::where('student_id', $user->id)->paginate(15);
        }

        if ($user->hasRole('Docent')) {
            $userassignments = UserAssignment::where('docent_id', $user->id)->paginate(15);
        }

        if ($user->hasRole('Beheerder', 'Auteur')) {
            $userassignments = UserAssignment::paginate(15);
        }
        
        return view('userassignments.index', compact('userassignments'));
    }

    public function view($id) {
        $userassignment = UserAssignment::find($id);
    
        $assignment = $userassignment->assignment;
    
        return view('userassignments.view', compact('userassignment', 'assignment'));
    }


    public function store(Request $request) {
        $validatedData = $request->validate([
            'student_answer' => 'required|string|max:255',
        ]);
    
        $user = User::find(Auth::user()->id);
    
        if (!$user->hasRole('Beheerder', 'Auteur')) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    
        $userAssignment = new UserAssignment($validatedData);
    
        $user->userAssignments()->save($userAssignment);
    
        return redirect()->route('userassignments.index');
    }
    
}
