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
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\LoginController;



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
Route::post('/login_post',[LoginController::class, 'login_post'])->name("login_post");
Route::get('/',[LoginController::class, 'login'])->name("login");
Route::get('/dashboard', function () { return view('dashboard');});


Route::controller(TahunAjaranController::class)->group(function () {
    Route::get('/tahunAjaran', 'index')->name('tahunAjaran.index');
    Route::get('/form_data_thn', 'form_data_thn')->name('tahunAjaran.form_data_thn');
    Route::get('/form_data_thn2/{id}', 'form_data_thn2')->name('tahunAjaran.form_data_thn2');
    Route::post('dataTahunAjaran', 'dataTahunAjaran')->name('tahunAjaran.dataTahunAjaran');
    Route::post('simpanThn', 'simpanThn')->name('tahunAjaran.simpanThn');
    Route::post('editThn', 'editThn')->name('tahunAjaran.editThn');
    Route::post('hapusThn', 'hapusThn')->name('tahunAjaran.hapusThn');
});


Route::controller(SemesterController::class)->group(function () {
    Route::get('/semester', 'index')->name('semester.index');
    Route::get('/form_data_smt', 'form_data_smt')->name('semester.form_data_smt');
    Route::get('/form_data_smt2/{id}', 'form_data_smt2')->name('tahunAjaran.form_data_smt2');
    Route::post('dataSemester', 'dataSemester')->name('semester.dataSemester');
    Route::post('simpanSmt', 'simpanSmt')->name('semester.simpanSmt');
    Route::post('editSmt', 'editSmt')->name('semester.editSmt');
    Route::post('hapusSmt', 'hapusSmt')->name('semester.hapusSmt');
});

Route::controller(StudyProgramController::class)->group(function () {
    Route::get('/program', 'index')->name('program.index');
    Route::get('/form_data_progKeh', 'form_data_progKeh')->name('program.form_data_progKeh');
    Route::get('/form_data_progKeh2/{id}', 'form_data_progKeh2')->name('program.form_data_progKeh2');
    Route::post('dataProgram', 'dataProgram')->name('program.dataProgram');
    Route::post('simpanProgKeh', 'simpanProgKeh')->name('program.simpanProgKeh');
    Route::post('editProgKeh', 'editProgKeh')->name('program.editProgKeh');
    Route::post('hapusProgKeh', 'hapusProgKeh')->name('program.hapusProgKeh');
});


Route::controller(StudentController::class)->group(function () {
    Route::get('/student', [StudentController::class, 'index']);
    Route::post('siswaData', [StudentController::class, 'siswa_data'])->name('siswaData');
    Route::get('step1/{id}/{bt}', [StudentController::class, 'step1']);
    Route::get('/step2/{id}/{bt}', [StudentController::class, 'step2']);
    Route::get('/step3/{id}/{bt}', [StudentController::class, 'step3']);
    Route::get('/step4/{id}/{bt}', [StudentController::class, 'step4']);
    Route::get('/detailSiswa/{id}', [StudentController::class, 'detail_siswa']);
    Route::get('/uploadBerkas/{id}', [StudentController::class, 'upload_berkas']);
    Route::get('/printData/{id}', [StudentController::class, 'print_data']);
    Route::get('/printFormulir/{id}', [StudentController::class, 'print_formulir']);
    Route::post('add-siswa', [StudentController::class, 'store'])->name('add-siswa');
    Route::post('simpanStep1', [StudentController::class, 'simpan1'])->name('simpanStep1');
    Route::post('simpanStep2', [StudentController::class, 'simpan2'])->name('simpanStep2');
    Route::post('simpanStep3', [StudentController::class, 'simpan3'])->name('simpanStep3');
    Route::post('simpanStep4', [StudentController::class, 'simpan4'])->name('simpanStep4');
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
    Route::post('insert_dataPeg', 'store')->name('employee.insert_dataPeg');
    Route::post('update_dataPeg', 'update')->name('employee.update_dataPeg');
    Route::post('upload_data', 'upload_data')->name('employee.upload_data');
    Route::post('hapusPeg', 'hapusPeg')->name('employee.hapusPeg');

});

Route::controller(ClassroomStudentController::class)->group(function () {
    Route::get('/classroomStudent', 'index')->name('classroomStudent.index');
    Route::post('getKelas', 'getKelas')->name('classroomStudent.getKelas');
    Route::post('ambilKelas', 'ambilKelas')->name('classroomStudent.ambilKelas');
    Route::get('/ClassDetail/{id}', 'detail_kelas')->name('classroomStudent.detail_kelas');
    Route::get('/pindahkan/{id}', 'pindah_kelas')->name('classroomStudent.pindah_kelas');
    Route::post('simpanPindah', 'simpanPindah')->name('classroomStudent.simpanPindah');
    // Route::get('/form_data/{id}/{nikPeg}', 'form_data')->name('classroomStudent.form_data');
    // Route::get('/autocomplete', 'autocomplete')->name('classroomStudent.autocomplete');
    // Route::post('/loopSiswa', 'loopSiswa')->name('classroomStudent.loopSiswa');
    // Route::post('/kelasSiswaData', 'kelasSiswaData')->name('classroomStudent.kelasSiswaData');
    // Route::post('/insert_data', 'store')->name('classroomStudent.insert_data');
});

Route::get('/user', [UserController::class, 'index'])->name('index');
Route::post('/data', [UserController::class, 'dataUser'])->name('dataUser');

Route::controller(ClassroomController::class)->group(function () {
    Route::get('/classroom', 'index')->name('classroom.index');
    Route::get('/form_data_kls', 'form_data_kls')->name('kelas.form_data_kls');
    Route::get('/form_data_kls2/{id}', 'form_data_kls2')->name('kelas.form_data_kls2');
    Route::get('/detail_kls/{id}', 'detail_kls')->name('kelas.detail_kls');
    Route::post('dataKelas', 'dataKelas')->name('kelas.dataKelas');
    Route::post('simpanKls', 'simpanKls')->name('kelas.simpanKls');
    Route::post('editKls', 'editKls')->name('kelas.editKls');
    Route::post('hapusKls', 'hapusKls')->name('kelas.hapusKls');


});
// Route::get('/classroom', [ClassroomController::class, 'index'])->name('classroom');
// Route::get('/create-class', [ClassroomController::class, 'create'])->name('create-class');
// Route::post('add-class', [ClassroomController::class, 'store'])->name('add-class');
// Route::get('edit-class', [ClassroomController::class, 'edit'])->name('edit-class');

Route::controller(MutationController::class)->group(function () {
    Route::get('/mutation', [MutationController::class, 'index']);
    Route::get('/updateMutasi/{id}', 'updateMutasi')->name('mutasi.updateMutasi');
    Route::get('/mutation-add/{id}',  'addMutasi')->name('mutasi.addMutasi');
    Route::post('dataMutasi', 'dataMutasi')->name('mutasi.dataMutasi');
    Route::post('uploadBerkasMutasi', 'uploadBerkasMutasi')->name('mutasi.uploadBerkasMutasi');
    Route::post('simpanMutasi', 'simpanMutasi')->name('mutasi.simpanMutasi');
});
