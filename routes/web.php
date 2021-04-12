<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('tasks', [TaskController::class, 'index'])->middleware(['auth', 'verified'])->name('tasks');
Route::get('tasks/done', [TaskController::class, 'done'])->middleware(['auth', 'verified'])->name('tasks.done');
Route::get('tasks/create', [TaskController::class, 'create'])->middleware(['auth', 'verified'])->name('tasks.create');
Route::post('tasks/store', [TaskController::class, 'store'])->middleware(['auth', 'verified'])->name('tasks.store');
Route::get('tasks/edit/{task}', [TaskController::class, 'edit'])->middleware(['auth', 'verified'])->name('tasks.edit');
Route::put('tasks/{task}', [TaskController::class, 'update'])->middleware('auth')->name('tasks.update');
// Route::put('tasks/done/{task}', [TaskController::class, 'done'])->middleware('auth')->name('tasks.done');
