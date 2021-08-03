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
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::resource('personal', \App\Http\Controllers\UserController::class)->middleware(['auth']);
Route::resource('reactors', \App\Http\Controllers\ReactorController::class)->middleware(['auth']);
Route::resource('works', \App\Http\Controllers\WorkController::class)->middleware(['auth']);
Route::get('works/{work}/tasks', [\App\Http\Controllers\WorkController::class, 'tasks'])->name('works.tasks')->middleware(['auth']);
Route::get('personal/{personal}/changepass', [\App\Http\Controllers\UserController::class, 'changepassform'])->name('personal.changepass');
Route::post('personal/{personal}/changepass', [\App\Http\Controllers\UserController::class, 'changepass'])->name('personal.changepass');
Route::post('tasks/store', [\App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store')->middleware(['auth']);

require __DIR__.'/auth.php';
