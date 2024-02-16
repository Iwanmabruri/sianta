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
Route::get('/student', [StudentController::class, 'index']);
Route::get('/step1', [StudentController::class, 'step1']);
Route::get('/step2', [StudentController::class, 'step2']);
Route::get('/step3', [StudentController::class, 'step3']);
Route::get('/employee', [EmployeeController::class, 'index']);
Route::post('add.employee', [EmployeeController::class, 'store'])->name('add-employee');
