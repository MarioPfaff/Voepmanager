<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\WorkprocessController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\CoretaskController;
use App\Http\Controllers\UserController;
use App\Models\Assignment;
use App\Models\UserAssignment;
use App\Models\UserAssignmentComment;
use App\Models\UserAssignmentFile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAssignmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Root of the application */
Route::get('/', function () {
    return view('welcome');
});

/* Assignment routes */
Route::get('/opdrachten', [AssignmentController::class, 'index'])->name('assignments.index');

Route::get('/opdrachten/create', [AssignmentController::class, 'create'])->name('assignments.create');
Route::post('/opdrachten', [AssignmentController::class, 'store'])->name('assignments.store');
Route::get('/opdrachten/{assignment}', [AssignmentController::class, 'show'])->name('assignments.show');
Route::get('/opdrachten/edit/{assignment}', [AssignmentController::class, 'edit'])->name('assignments.edit');
Route::put('/opdrachten/update/{assignment}', [AssignmentController::class, 'update'])->name('assignments.update');
Route::get('/opdrachten/destroy/{assignment}', [AssignmentController::class, 'destroy'])->name('assignments.destroy');

/* UserAssignment routes */
Route::get('/userassignments', [UserAssignmentController::class, 'index'])->name('userassignments.index');
Route::get('/userassignments/view/{id}' , [UserAssignmentController::class, 'view'])->name('userassignments.view');
Route::get('/userassignments/create', [UserAssignmentController::class, 'create'])->name('userassignments.create');
Route::post('/userassignments', [UserAssignmentController::class, 'store'])->name('userassignments.store');
Route::put('/userassignments/update/{userassignment}', [UserAssignmentController::class, 'update'])->name('userassignments.update');

/* Route for login */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/* Route for profile */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* Security middleware working together with spatie-permissions */

/* Viewing User  */
Route::group(['middleware' => ['permission:user.view']], function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});

/* Creating User  */
Route::group(['middleware' => ['permission:user.create']], function () {
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
});

/* Editing User  */
Route::group(['middleware' => ['permission:user.edit']], function () {
    Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/update/{user}', [UserController::class, 'update'])->name('users.update');
});

/* Deleting User  */
Route::group(['middleware' => ['permission:user.delete']], function () {
    Route::get('users/destroy/{id}', [UserController::class, 'destroy']);
});

/* Viewing Role  */
Route::group(['middleware' => ['permission:role.view']], function () {
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
});

/* Creating Role  */
Route::group(['middleware' => ['permission:role.create']], function () {
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
});

/* Editing Role  */
Route::group(['middleware' => ['permission:role.edit']], function () {
    Route::get('/roles/edit/{role}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/update/{role}', [RoleController::class, 'update'])->name('roles.update');
});

/* Deleting Role  */
Route::group(['middleware' => ['permission:role.delete']], function () {
    Route::get('roles/destroy/{id}', [RoleController::class, 'destroy']);
});

/* Viewing Workprocess  */
// Route::group(['middleware' => ['permission:workprocess.view']], function () {
    Route::get('/werkprocessen', [WorkprocessController::class, 'index'])->name('workprocesses.index');
// });

/* Creating Workprocess  */
// Route::group(['middleware' => ['permission:role.create']], function () {
    Route::get('/werkprocessen/create', [WorkprocessController::class, 'create'])->name('workprocesses.create');
    Route::post('/werkprocessen', [WorkprocessController::class, 'store'])->name('workprocesses.store');
// });

/* Editing Workprocess  */
// Route::group(['middleware' => ['permission:user.edit']], function () {
    Route::get('/werkprocessen/edit/{workprocess}', [WorkprocessController::class, 'edit'])->name('workprocesses.edit');
    Route::put('/werkprocessen/update/{workprocess}', [WorkprocessController::class, 'update'])->name('workprocesses.update');
    Route::get('/werkprocessen/view/{workprocess}', [WorkprocessController::class, 'view'])->name('workprocesses.view');
// });

/* Deleting Workprocess */
// Route::group(['middleware' => ['permission:role.delete']], function () {
    Route::get('werkprocessen/destroy/{id}', [WorkprocessController::class, 'destroy'])->name('workprocesses.delete');
// });


/* Viewing Core tasks  */
// Route::group(['middleware' => ['permission:workprocess.view']], function () {
    Route::get('/kerntaken', [CoretaskController::class, 'index'])->name('core_tasks.index');
// });

/* Creating core task  */
// Route::group(['middleware' => ['permission:role.create']], function () {
    Route::get('/kerntaken/create', [CoretaskController::class, 'create'])->name('core_tasks.create');
    Route::post('/kerntaken', [CoretaskController::class, 'store'])->name('core_tasks.store');
// });

/* Editing core task  */
// Route::group(['middleware' => ['permission:user.edit']], function () {
    Route::get('/kerntaken/edit/{core_task}', [CoretaskController::class, 'edit'])->name('core_tasks.edit');
    Route::put('/kerntaken/update/{core_task}', [CoretaskController::class, 'update'])->name('core_tasks.update');
// });

/* Deleting core task */
// Route::group(['middleware' => ['permission:role.delete']], function () {
    Route::get('kerntaken/destroy/{id}', [CoretaskController::class, 'destroy'])->name('core_tasks.delete');
// });

require __DIR__.'/auth.php';
