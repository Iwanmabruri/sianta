<?php

namespace App\Http\Controllers;

// use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('siswa.index');
    }

    public function step1($nik, $bt)
    {
        return view('siswa.inputStep1', compact("nik", "bt"));
    }

    public function step2()
    {
        return view('siswa.inputStep2');
    }

    public function step3()
    {
        return view('siswa.inputStep3');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = DB::table("siswa")->count() + 1;
        $data = array();
        $data['nikSiswa'] = $count; //nik tidak valid
        $data['namaSiswa'] = '';
        $data['nisnSiswa'] = 1;
        $data['tglLahir'] = '';
        $data['tempatLahir'] = '';
        $data['detAlamat'] = '';
        $data['desa'] = '';
        $data['kecamatan'] = '';
        $data['kabKota'] = '';
        $data['provinsi'] = '';
        $data['jk'] = '0';
        $data['agama'] = '';
        $data['nipdSiswa'] = '';
        $data['noKK'] = '';
        $data['statusAnak'] = '';
        $data['anakKe'] = 99; //anakKe tidak valid
        $data['jmlSaudara'] = 99; //jmlSaudara tidak valid
        $data['jnsTempTinggal'] = '';
        $data['sklAsal'] = '';
        $data['nohp'] = 1; //nohp tidak valid
        $data['noIjazah'] = '';
        $data['nikAyah'] = '';
        $data['nmAyah'] = '';
        $data['tglLahirAyah'] = '';
        $data['pendAyah'] = '';
        $data['pkrjnAyah'] = '';
        $data['penghAyah'] = '';
        $data['nikIbu'] = '';
        $data['nmIbu'] = '';
        $data['tglLahirIbu'] = '';
        $data['pendIbu'] = '';
        $data['pkrjnIbu'] = '';
        $data['penghIbu'] = '';
        $data['idProdi'] = '';
        $data['tglDiterima'] = '';
        $data['thLulus'] = 1; //thLulus tidak valid
        $data['fotoIjazah'] = '';
        $data['fotoKK'] = '';
        $data['fotoAkta'] = '';
        $data['fotoMasuk'] = '';
        $data['fotoKeluar'] = '';
        $data['status'] = '0';
        DB::table("siswa")->insert($data);
        return $count;
    }

    function get_kabupaten(Request $request) {
        $idProvinsi = $request->id;
        $kab = $request->kab;
        return view('siswa.getKabupaten', compact('idProvinsi', 'kab'));
    }

    function get_kecamatan(Request $request) {
        $idKabupaten = $request->id;
        $kec = $request->kec;
        return view('siswa.getKecamatan', compact('idKabupaten', 'kec'));
    }
    
    function get_desa(Request $request) {
        $idKecamatan = $request->id;
        $des = $request->des;
        return view('siswa.getDesa', compact('idKecamatan', 'des'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
