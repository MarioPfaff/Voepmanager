<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAssignment; // Import the UserAssignment model
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Spatie\Permission\Traits\HasRoles; // Import the HasRoles trait
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Assignment;
use App\Models\Workprocess;


class UserAssignmentController extends Controller 
{    
    use HasFactory, Notifiable, HasRoles;

    public function index() {
        /* Mario */
        $user = User::find(Auth::user()->id);
        /* Test om de boolean te checken van gebruiker:
           dd($user->hasRole('Student')); */

        if ($user->hasRole('Student')) {
            $userassignments = UserAssignment::where('student_id', $user->id)->
            orderByRaw("phase = 'Niet ingeleverd' DESC")->
            orderByRaw("phase = 'Ingeleverd, niet nagekeken' DESC")->
            orderByRaw("progress = 'Niet beoordeeld' DESC")->
            orderByRaw("progress = 'Afgekeurd' DESC")->
            orderByRaw("progress = 'Goedgekeurd' DESC")->
            latest('updated_at')
            ->paginate(15);

            /* Hier definieeren we de variabelen van assignments met verschillende queries. */
            $assignmentsApproved = UserAssignment::where('student_id', $user->id)->where('progress', 'Goedgekeurd')->count();
            $assignmentsNotDelivered = UserAssignment::where('student_id', $user->id)->where('phase', 'Niet ingeleverd')->count();
            $assignmentsAssigned = UserAssignment::where('student_id', $user->id)->count();
            $assignmentsAll = Assignment::query()->count() - $assignmentsAssigned;

            /* Hier begint de functie om werkprocessen te checken */
            $workprocesses = Workprocess::all();
            $assignments = Assignment::all();
            
            return view('userassignments.index', 
            compact('userassignments', 
            'assignmentsApproved',
            'assignmentsNotDelivered',
            'assignmentsAssigned',
            'assignmentsAll',
            'workprocesses',
            'assignments'));
        }

        if ($user->hasRole('Docent')) {
            $teacherassignments = UserAssignment::All();
            $assignments = Assignment::paginate(15);
            return view('teacherassignments.index', compact('teacherassignments', 'assignments'));
        }

        if ($user->hasRole('Beheerder', 'Auteur')) {
            $userassignments = UserAssignment::paginate(15);
        }

    }

    public function create($id) {
        // vindt de huidige user
        $user = User::find(Auth::user()->id);

        //check of de user een docent is
        if ($user->hasRole('Docent')) {
            $userassignments = UserAssignment::All();
            $possiblePhases = ['Niet ingeleverd', 'Ingeleverd, niet nagekeken', 'Nagekeken'];
            $possibleProgresses = ['Niet beoordeeld', 'Goedgekeurd', 'Afgekeurd'];
            $assignments = Assignment::findOrFail($id);
            $students = User::role('Student')->get();
            return view('teacherassignments.create', compact('userassignments', 'assignments', 'students', 'possiblePhases', 'possibleProgresses'));
        }
    }

    public function store(Request $request) {
        /* Validate the form */
        $data = $request->validate([
            'student_id' => 'required',
            'docent_id' => 'required',
            'assignment_id' => 'required',
            'phase' => 'required|string',
            'progress' => 'required|string',
        ]);

        /* Assign the student to the assignment */
        $userassignment = Userassignment::create([
            'student_id' => $request->student_id,
            'docent_id' => $request->docent_id ?? Auth::user()->id,
            'assignment_id' => $request->assignment_id,
            'phase' => $request->phase,
            'progress' => $request->progress
        ]);

        /* Save the created object in variable userassignment */
        $userassignment->save();

        /* Redirect to the assignment overview page */
        return to_route('teacherassignments.index')->with('success', 'Opdracht toegewezen!');
    }

    /* ik heb de variabel $id null gemaakt, zodat de if statement van docent werkt zonder de variabel */
    public function view($id = null) {

        $user = User::find(Auth::user()->id);

        if ($user->hasRole('Student')) {
            /* hier check ik of die een userassignment id kan vinden, 
            anders pakt die de eerste userassignment van de student */
            $userassignment = $id ? UserAssignment::find($id) : $user->userAssignments->first();
        
            $assignment = $userassignment->assignment;
        
            return view('userassignments.view', compact('userassignment', 'assignment'));
        }

        /* ik heb de view gesplitst in rollen. Zo kun je 2 verschillende views maken met 1 functie */
        if ($user->hasRole('Docent')) {
            /* ik pak alle rijen in de userassignment tabel en ik filter op de docent_id van de ingelogde user */
            $teacherassignments = UserAssignment::where('docent_id', $user->id)->paginate(15);
            /* hier maak ik de waardes voor de phase filter in de view pagina */
            $phases = ['Niet ingeleverd', 'Ingeleverd, niet nagekeken', 'Nagekeken'];
            return view('teacherassignments.view', compact('teacherassignments', 'phases'));
        }
    }

    /* edit functie waar ik de userassignment vind.
    Ook maak ik de variabel $progresses met de waarde die in de dropdown zitten op de edit pagina */
    public function edit($id) {
        $teacherassignment = UserAssignment::findOrFail($id);
        $progresses = ['Goedgekeurd', 'Afgekeurd'];
        return view('teacherassignments.edit', compact('teacherassignment', 'progresses'));
    }

    public function update(Request $request, UserAssignment $userassignment) {

        $user = User::find(Auth::user()->id);

        if ($user->hasRole('Student')) {
            $request->validate([
                'student_answer' => 'string',
            ]);
    
            $data = $request->merge([
                'student_id' => $user->id,
                'phase' => 'Ingeleverd, niet nagekeken',
                'progress' => 'Niet beoordeeld',
                'student_answer' => $request->student_answer,
            ]);
    
                
            $userassignment->update($data->all());
        
            return redirect()->route('userassignments.index');
        }

        /* ik heb de update gesplitst gebaseerd op rollen. 
        De student functie is voor een opdracht inlevern. Die van docent is voor beoordelen */
        if ($user->hasRole('Docent')) {
            /* Deze request velden zijn degene die de docent moet invullen */
            $request->validate([
                'progress' => 'string',
            ]);
            
            /* de waarde die naar de database worden geschreven.
            phase is automatisch ingevuld als Nagekeken. 
            progress is een dropdown met 1 van de 2 waardes die ik heb gedefineerd in de edit functie */
            $data = $request->merge([
                'phase' => 'Nagekeken',
                'progress' => $request->progress,
            ]);
    
            $userassignment->update($data->all());
        
            return redirect()->route('teacherassignments.view')->with('success', 'Opdracht beoordeeld!');
        }
    }
}
