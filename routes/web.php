<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkprocessController;

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
    Route::get('/workprocesses', [WorkprocessController::class, 'index'])->name('workprocesses.index');
// });

/* Editing Workprocess  */
// Route::group(['middleware' => ['permission:user.edit']], function () {
    Route::get('/workprocesses/edit/{workprocess}', [WorkprocessController::class, 'edit'])->name('workprocesses.edit');
    Route::put('/workprocesses/update/{workprocess}', [WorkprocessController::class, 'update'])->name('workprocesses.update');
// });

require __DIR__.'/auth.php';
