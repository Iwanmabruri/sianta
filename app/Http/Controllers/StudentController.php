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

    public function step2($nik, $bt)
    {
        return view('siswa.inputStep2', compact("nik", "bt"));
    }

    public function step3($nik, $bt)
    {
        return view('siswa.inputStep3', compact("nik", "bt"));
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

    public function simpan1(Request $request) {
        $data = array();
        $data['nikSiswa'] = $request->nik;
        $data['nisnSiswa'] = $request->nisn;
        $data['nipdSiswa'] = $request->nipd;
        $data['noKK'] = $request->nokk;
        $data['namaSiswa'] = strtoupper($request->nama);
        $data['jk'] = $request->jenkel;
        $data['tempatLahir'] = strtoupper($request->tmpLahir);
        $data['tglLahir'] = $request->thnLahir.'-'.$request->blnLahir.'-'.$request->tglLahir;
        $data['detAlamat'] = strtoupper($request->alamat);
        $data['provinsi'] = $request->provinsi;
        $data['kabKota'] = $request->kabupaten;
        $data['kecamatan'] = $request->kecamatan;
        $data['desa'] = $request->desa;
        $update = DB::table('siswa')->where('nikSiswa', $request->nikAwal)->update($data);

        if ($update == 0 || $update == 1) {
            return $request->nik;
        } else {
            return "k";
        }
    }

    public function simpan2(Request $request) {
        $data = array();
        $data['nikAyah'] = $request->nik_a;
        $data['nmAyah'] = strtoupper($request->nm_a);
        $data['tglLahirAyah'] = $request->thnLahirAyah.'-'.$request->blnLahirAyah.'-'.$request->tglLahirAyah;
        $data['pendAyah'] = strtoupper($request->pkrjnAyah);
        $data['pkrjnAyah'] = strtoupper($request->pndknAyah);
        $data['penghAyah'] = strtoupper($request->pndptnAyah);
        $data['nikIbu'] = $request->nik_i;
        $data['nmIbu'] = strtoupper($request->nm_i);
        $data['tglLahirIbu'] = $request->thnLahirIbu.'-'.$request->blnLahirIbu.'-'.$request->tglLahirIbu;
        $data['pendIbu'] = strtoupper($request->pkrjnIbu);
        $data['pkrjnIbu'] = strtoupper($request->pndknIbu);
        $data['penghIbu'] = strtoupper($request->pndptnIbu);
        
        $update = DB::table('siswa')->where('nikSiswa', $request->nikAwal)->update($data);

        if ($update == 0 || $update == 1) {
            return $request->nikAwal;
        } else {
            return "k";
        }
    }

    public function simpan3(Request $request) {
        $data = array();
        $data['nikWali'] = $request->nik_w;
        $data['nmWali'] = strtoupper($request->nm_w);
        $data['tglLahirWali'] = $request->thnLahirWali.'-'.$request->blnLahirWali.'-'.$request->tglLahirWali;
        $data['pendWali'] = strtoupper($request->pkrjnWali);
        $data['pkrjnWali'] = strtoupper($request->pndknWali);
        $data['penghWali'] = strtoupper($request->pndptnWali);
        $data['jnsTempTinggal'] = strtoupper($request->tmpTinggal);
        $data['statusAnak'] = $request->statusAnak;
        $data['anakKe'] = $request->anakKe;
        $data['jmlSaudara'] = $request->jmlSaudara;
        $data['nohp'] = $request->noHp;
        $data['sklAsal'] = strtoupper($request->sekolahAsal);
        $data['noIjazah'] = $request->noIjazah;
        $data['idProdi'] = $request->prodi;
        $data['agama'] = strtoupper($request->agama);
        $data['tglDiterima'] = $request->tglDiterima;
        $update = DB::table('siswa')->where('nikSiswa', $request->nikAwal)->update($data);

        if ($update == 0 || $update == 1) {
            return 1;
        } else {
            return "k";
        }
    }

    public function batalkan(Request $request) {
        $hapus = DB::table('siswa')->where('nikSiswa', $request->nik)->delete();
        
        if ($hapus == 1 ) {
            return "1";
        } else {
            return "2";
        }
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
