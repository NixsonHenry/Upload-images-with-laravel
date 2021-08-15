<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

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

Route::get('students', [StudentsController::class, 'index'])->name('students');
Route::get('students/create', [StudentsController::class, 'create'])->name('students.create');
Route::post('students', [StudentsController::class, 'store'])->name('students.store');
Route::get('students/{student}/edit', [StudentsController::class, 'edit'])->name('students.edit');
Route::patch('students/{student}', [StudentsController::class, 'update'])->name('students.update'); 
Route::delete('students/{student}', [StudentsController::class, 'destroy'])->name('students.destroy'); 