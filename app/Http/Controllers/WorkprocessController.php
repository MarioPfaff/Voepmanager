<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\Workprocess;

class WorkprocessController extends Controller
{
    public function index() {

        $workprocesses = Workprocess::all();
        return view('workprocesses.index', compact('workprocesses'));        
    }
}
