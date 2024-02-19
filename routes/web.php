<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudyProgramController;

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
Route::get('/program', [StudyProgramController::class, 'index']);
Route::post('add-program', [StudyProgramController::class, 'store'])->name('add-program');
Route::delete('delete-program/{idProdi}', [StudyProgramController::class, 'destroy'])->name('delete-program');
Route::get('/student', [StudentController::class, 'index']);
Route::get('/step1', [StudentController::class, 'step1']);
Route::get('/step2', [StudentController::class, 'step2']);
Route::get('/step3', [StudentController::class, 'step3']);
Route::post('add-siswa', [StudentController::class, 'store'])->name('add-siswa');
Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');
