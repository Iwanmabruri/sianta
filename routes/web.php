<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudyProgramController;
use App\Http\Controllers\ClassroomStudentController;
use App\Http\Controllers\MutationController;
use App\Http\Controllers\TahunAjaranController;


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

Route::controller(TahunAjaranController::class)->group(function () {
    Route::get('/tahunAjaran', 'index')->name('tahunAjaran.index');
    Route::get('/form_data_thn', 'form_data_thn')->name('tahunAjaran.form_data_thn');
    Route::get('/form_data_thn2/{id}', 'form_data_thn2')->name('tahunAjaran.form_data_thn2');
    Route::post('dataTahunAjaran', 'dataTahunAjaran')->name('tahunAjaran.dataTahunAjaran');
    Route::post('simpan', 'simpan')->name('tahunAjaran.simpan');
});


Route::get('/program', [StudyProgramController::class, 'index']);
Route::post('add-program', [StudyProgramController::class, 'store'])->name('add-program');
Route::delete('delete-program/{idProdi}', [StudyProgramController::class, 'destroy'])->name('delete-program');

Route::controller(StudentController::class)->group(function () {
    Route::get('/student', [StudentController::class, 'index']);
    Route::post('siswaData', [StudentController::class, 'siswa_data'])->name('siswaData');
    Route::get('step1/{nik}/{bt}', [StudentController::class, 'step1']);
    Route::get('/step2/{nik}/{bt}', [StudentController::class, 'step2']);
    Route::get('/step3/{nik}/{bt}', [StudentController::class, 'step3']);
    Route::get('/detailSiswa/{nik}', [StudentController::class, 'detail_siswa']);
    Route::get('/uploadBerkas/{nik}', [StudentController::class, 'upload_berkas']);
    Route::get('/printData/{nik}', [StudentController::class, 'print_data']);
    Route::get('/printFormulir/{nik}', [StudentController::class, 'print_formulir']);
    Route::post('add-siswa', [StudentController::class, 'store'])->name('add-siswa');
    Route::post('simpanStep1', [StudentController::class, 'simpan1'])->name('simpanStep1');
    Route::post('simpanStep2', [StudentController::class, 'simpan2'])->name('simpanStep2');
    Route::post('simpanStep3', [StudentController::class, 'simpan3'])->name('simpanStep3');
    Route::post('upload-berkas', [StudentController::class, 'simpanBerkas'])->name('upload-berkas');
    Route::post('batal', [StudentController::class, 'batalkan'])->name('batal');
    Route::post('getKabupaten', [StudentController::class, 'get_kabupaten'])->name('getKabupaten');
    Route::post('getKecamatan', [StudentController::class, 'get_kecamatan'])->name('getKecamatan');
    Route::post('getDesa', [StudentController::class, 'get_desa'])->name('getDesa');
});

Route::controller(EmployeeController::class)->group(function () {
    Route::get('/employee', 'index')->name('employee.index');
    Route::get('/form_data', 'form_data')->name('employee.form_data');
    Route::get('/form_data2/{id}', 'form_data2')->name('employee.form_data2');
    Route::get('/form_upload/{id}', 'form_upload')->name('employee.form_upload');
    Route::get('/form_detail/{id}', 'show')->name('employee.form_detail');
    Route::post('/pegawai_data', 'pegawai_data')->name('employee.pegawai_data');
    Route::post('/insert_data', 'store')->name('employee.insert_data');
    Route::post('/update_data', 'update')->name('employee.update_data');
    Route::post('/upload_data', 'upload_data')->name('employee.upload_data');
});

Route::controller(ClassroomStudentController::class)->group(function () {
    Route::get('/classroomStudent', 'index')->name('classroomStudent.index');
    Route::get('/form_data/{id}/{nikPeg}', 'form_data')->name('classroomStudent.form_data');
    Route::get('/autocomplete', 'autocomplete')->name('classroomStudent.autocomplete');
    Route::post('/loopSiswa', 'loopSiswa')->name('classroomStudent.loopSiswa');
    Route::post('/kelasSiswaData', 'kelasSiswaData')->name('classroomStudent.kelasSiswaData');
    Route::post('/insert_data', 'store')->name('classroomStudent.insert_data');
});

Route::get('/user', [UserController::class, 'index'])->name('index');
Route::post('/data', [UserController::class, 'dataUser'])->name('dataUser');

//Route Kelas
Route::get('/classroom', [ClassroomController::class, 'index'])->name('classroom');
Route::get('/create-class', [ClassroomController::class, 'create'])->name('create-class');
Route::post('add-class', [ClassroomController::class, 'store'])->name('add-class');
Route::get('edit-class', [ClassroomController::class, 'edit'])->name('edit-class');

Route::controller(MutationController::class)->group(function () {
    Route::get('/mutation', [MutationController::class, 'index']);
});
