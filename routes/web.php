<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('guests.welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')
    ->prefix("admin")
    ->name("profile.")
    ->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('destroy');
});

Route::middleware(['auth', 'verified'])
	->prefix("admin")
	->name("admin.")
	->group(function () {
		Route::get("/projects/create", [ProjectController::class, "create"])->name("projects.create");
		Route::post("/projects", [ProjectController::class, "store"])->name("projects.store");

		Route::get("/projects", [ProjectController::class, "index"])->name("projects.index");
		Route::get("/projects/{project}", [ProjectController::class, "show"])->name("projects.show");
});

require __DIR__ . '/auth.php';