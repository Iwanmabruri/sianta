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
Route::get('step1/{nik}/{bt}', [StudentController::class, 'step1']);
Route::get('/step2/{nik}/{bt}', [StudentController::class, 'step2']);
Route::get('/step3', [StudentController::class, 'step3']);
Route::post('add-siswa', [StudentController::class, 'store'])->name('add-siswa');
Route::post('simpanStep1', [StudentController::class, 'simpan1'])->name('simpanStep1');
Route::post('batal', [StudentController::class, 'batalkan'])->name('batal');
Route::post('getKabupaten', [StudentController::class, 'get_kabupaten'])->name('getKabupaten');
Route::post('getKecamatan', [StudentController::class, 'get_kecamatan'])->name('getKecamatan');
Route::post('getDesa', [StudentController::class, 'get_desa'])->name('getDesa');

Route::controller(EmployeeController::class)->group(function () {
    Route::get('/employee', 'index')->name('employee.index');
    Route::get('/form_data', 'form_data')->name('employee.form_data');
    Route::get('/form_data2/{id}', 'form_data2')->name('employee.form_data2');
    Route::post('/pegawai_data', 'pegawai_data')->name('employee.pegawai_data');
    Route::post('/insert_data', 'store')->name('employee.insert_data');
    Route::post('/update_data', 'update')->name('employee.update_data');
});
