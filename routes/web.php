<?php

use App\Http\Controllers\ProfileController;
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
		Route::get("/projects/create", [PostController::class, "create"])->name("projects.create");
		Route::get("/projects", [PostController::class, "store"])->name("projects.store");

		Route::get("/projects", [PostController::class, "index"])->name("projects.index");
		Route::get("/projects/{project}", [PostController::class, "show"])->name("projects.show");
});

require __DIR__ . '/auth.php';

////////////////////////////////////////////ESEMPI////////////////////////////////////////////

//Genera tutte le Route
// Route::resource("comics", ComicController::class);

// ROTTE CRUD COMICS

// CREATE
//Route::get('/comics/create', [ComicController::class, "create"])->name("comics.create");
//Route::post('/comics', [ComicController::class, "store"])->name("comics.store");

// READ
//Route::get('/comics', [ComicController::class, "index"])->name("comics.index");
//Route::get('/comics/{id}', [ComicController::class, "show"])->name("comics.show");

// UPDATE
//Route::get('/comics/{id}/edit', [ComicController::class, "edit"])->name("comics.edit");
//Route::put('/comics/{id}', [ComicController::class, "update"])->name("comics.update");

// DESTROY
//Route::delete('/comics/{id}', [ComicController::class, "destroy"])->name("comics.destroy");