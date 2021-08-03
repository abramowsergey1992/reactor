<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::resource('personal', \App\Http\Controllers\UserController::class);
Route::resource('reactors', \App\Http\Controllers\ReactorController::class);
Route::resource('works', \App\Http\Controllers\WorkController::class);
Route::get('works/{work}/tasks', [\App\Http\Controllers\WorkController::class, 'tasks'])->name('works.tasks');
Route::post('tasks/store', [\App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');

require __DIR__.'/auth.php';
