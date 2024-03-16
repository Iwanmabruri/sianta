<?php

namespace App\Http\Controllers;

// use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Intervention\Image\Facades\Image;

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

    public function siswa_data()
    {
        $data = DB::table('siswa')->where('status', 'Aktif');
        $datatable = DataTables::of($data);
        return $datatable
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                $bt = '
                    <div class="dropdown">
                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Aksi
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><button class="dropdown-item edit" data="' . $row->nikSiswa . '" type="button">Edit</button></li>
                            <li><button class="dropdown-item detail" data="' . $row->nikSiswa . '" type="button">Detail</button></li>
                            <li><button class="dropdown-item upload" data="' . $row->nikSiswa . '" type="button">Upload</button></li>
                            <li><button class="dropdown-item print" data="' . $row->nikSiswa . '" type="button">Print</button></li>
                        </ul>
                    </div>
                ';

                return $bt . "";
            })
            ->addColumn('nik', function ($row) {
                $n = $row->nikSiswa;
                return $n . "";
            })
            ->addColumn('nama', function ($row) {
                $c = $row->namaSiswa;
                return $c . "";
            })
            ->addColumn('nipd', function ($row) {
                $b = $row->nipdSiswa;
                return $b . "";
            })
            ->addColumn('berkas', function ($row) {
                if ($row->fotoMasuk == '') {
                    $ftm = "<span class='text-danger'>Tidak Ada</span>";
                } else {
                    $ftm = "<span>Ada</span>";
                }

                if ($row->fotoIjazah == '') {
                    $fti = "<span class='text-danger'>Tidak Ada</span>";
                } else {
                    $fti = "<span>Ada</span>";
                }

                if ($row->fotoKK == '') {
                    $ftk = "<span class='text-danger'>Tidak Ada</span>";
                } else {
                    $ftk = "<span>Ada</span>";
                }

                if ($row->fotoAkta == '') {
                    $fta = "<span class='text-danger'>Tidak Ada</span>";
                } else {
                    $fta = "<span>Ada</span>";
                }

                if ($row->fotoKeluar == '') {
                    $ftl = "<span class='text-danger'>Tidak Ada</span>";
                } else {
                    $ftl = "<span>Ada</span>";
                }

                $tb = "<table style='border:0px;'>"
                    . "<tr class='py-2'>"
                    . "<td><b>Foto Masuk</b></td><td>&nbsp;:&nbsp;</td><td>" . $ftm . "</td>"
                    . "</tr>"
                    . "<tr class='py-2'>"
                    . "<td><b>Scan Ijazah</b></td><td>&nbsp;:&nbsp;</td><td>" . $fti . "</td>"
                    . "</tr>"
                    . "<tr class='py-2'>"
                    . "<td><b>Scan KK</b></td><td>&nbsp;:&nbsp;</td><td>" . $ftk . "</td>"
                    . "</tr>"
                    . "<tr class='py-2'>"
                    . "<td><b>Scan Akta</b></td><td>&nbsp;:&nbsp;</td><td>" . $fta . "</td>"
                    . "</tr>"
                    . "<tr class='py-2'>"
                    . "<td><b>Foto Lulus</b></td><td>&nbsp;:&nbsp;</td><td>" . $ftl . "</td>"
                    . "</tr>"
                    . "</table>";
                return $tb . "";
            })
            ->rawColumns(['aksi', 'nik', 'nama', 'nipd', 'berkas'])
            ->make(true);
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

    public function detail_siswa($nik)
    {
        return view('siswa.detailSiswa', compact("nik"));
    }

    public function upload_berkas($nik)
    {
        return view('siswa.upload', compact("nik"));
    }

    public function print_data($nik)
    {
        return view('siswa.pilihPrint', compact("nik"));
    }

    public function print_formulir($nik)
    {
        return view('siswa.formulir', compact("nik"));
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

    public function simpan1(Request $request)
    {
        // $validasi = DB::table('siswa')->where('niksiswa', $request->nik)->count();
        // if ($validasi > 0) {
        //     return 'M';
        // } else {
        $data = array();
        $data['nikSiswa'] = $request->nik;
        $data['nisnSiswa'] = $request->nisn;
        $data['nipdSiswa'] = $request->nipd;
        $data['noKK'] = $request->nokk;
        $data['namaSiswa'] = strtoupper($request->nama);
        $data['jk'] = $request->jenkel;
        $data['tempatLahir'] = strtoupper($request->tmpLahir);
        $data['tglLahir'] = $request->thnLahir . '-' . $request->blnLahir . '-' . $request->tglLahir;
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
        // }
    }

    public function simpan2(Request $request)
    {
        $data = array();
        $data['nikAyah'] = $request->nik_a;
        $data['nmAyah'] = strtoupper($request->nm_a);
        $data['tglLahirAyah'] = $request->thnLahirAyah . '-' . $request->blnLahirAyah . '-' . $request->tglLahirAyah;
        $data['pendAyah'] = strtoupper($request->pkrjnAyah);
        $data['pkrjnAyah'] = strtoupper($request->pndknAyah);
        $data['penghAyah'] = strtoupper($request->pndptnAyah);
        $data['nikIbu'] = $request->nik_i;
        $data['nmIbu'] = strtoupper($request->nm_i);
        $data['tglLahirIbu'] = $request->thnLahirIbu . '-' . $request->blnLahirIbu . '-' . $request->tglLahirIbu;
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

    public function simpan3(Request $request)
    {
        $data = array();
        $data['nikWali'] = $request->nik_w;
        $data['nmWali'] = strtoupper($request->nm_w);
        $data['tglLahirWali'] = $request->thnLahirWali . '-' . $request->blnLahirWali . '-' . $request->tglLahirWali;
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
        $data['status'] = 'Aktif';
        $update = DB::table('siswa')->where('nikSiswa', $request->nikAwal)->update($data);

        if ($update == 0 || $update == 1) {
            return 1;
        } else {
            return "k";
        }
    }

    public function batalkan(Request $request)
    {
        $hapus = DB::table('siswa')->where('nikSiswa', $request->nik)->delete();

        if ($hapus == 1) {
            return "1";
        } else {
            return "2";
        }
    }

    function get_kabupaten(Request $request)
    {
        $idProvinsi = $request->id;
        $kab = $request->kab;
        return view('siswa.getKabupaten', compact('idProvinsi', 'kab'));
    }

    function get_kecamatan(Request $request)
    {
        $idKabupaten = $request->id;
        $kec = $request->kec;
        return view('siswa.getKecamatan', compact('idKabupaten', 'kec'));
    }

    function get_desa(Request $request)
    {
        $idKecamatan = $request->id;
        $des = $request->des;
        return view('siswa.getDesa', compact('idKecamatan', 'des'));
    }

    public function simpanBerkas(Request $request)
    {
        $data = array();

        function acakangkahuruf($panjang)
        {
            $karakter = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
            $string = "";
            for ($i = 0; $i <= $panjang; $i++) {
                $pos = rand(0, strlen($karakter) - 1);
                $string .= $karakter[$pos];
            }
            return $string;
        }

        $fileName = rand(00000, 99999) . acakangkahuruf(1) . ".jpg";

        if ($request->file('fotoMasuk') != "") {
            $foto_masuk = Image::make($request->file("fotoMasuk"));
            $foto_masuk->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if (file_exists($request->fotoMasukLama)) {
                unlink($request->fotoMasukLama);
            }
            $foto_masuk->save("../gambar/siswa/fotoMasuk/foto_masuk" . $fileName, 100);
            $data["fotoMasuk"] = "gambar/siswa/fotoMasuk/foto_masuk" . $fileName;
        } else {
            $data["fotoMasuk"] = $request->fotoMasukLama;
        }

        if ($request->file('fotoKK') != "") {
            $foto_kk = Image::make($request->file("fotoKK"));
            $foto_kk->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if (file_exists($request->fotoKKLama)) {
                unlink($request->fotoKKLama);
            }
            $foto_kk->save("../gambar/siswa/fotoKK/foto_kk" . $fileName, 100);
            $data["fotoKK"] = "gambar/siswa/fotoKK/foto_kk" . $fileName;
        } else {
            $data["fotoKK"] = $request->fotoKKLama;
        }

        if ($request->file('fotoAkta') != "") {
            $foto_akta = Image::make($request->file("fotoAkta"));
            $foto_akta->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if (file_exists($request->fotoAktaLama)) {
                unlink($request->fotoAktaLama);
            }
            $foto_akta->save("../gambar/siswa/fotoAkta/foto_akta" . $fileName, 100);
            $data["fotoAkta"] = "gambar/siswa/fotoAkta/foto_akta" . $fileName;
        } else {
            $data["fotoAkta"] = $request->fotoAktaLama;
        }

        if ($request->file('fotoIjazah') != "") {
            $foto_ijazah = Image::make($request->file("fotoIjazah"));
            $foto_ijazah->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if (file_exists($request->fotoIjazahLama)) {
                unlink($request->fotoIjazahLama);
            }
            $foto_ijazah->save("../gambar/siswa/fotoIjazah/foto_ijazah" . $fileName, 100);
            $data["fotoIjazah"] = "gambar/siswa/fotoIjazah/foto_ijazah" . $fileName;
        } else {
            $data["fotoIjazah"] = $request->fotoIjazahLama;
        }

        if ($request->file('fotoKeluar') != "") {
            $foto_keluar = Image::make($request->file("fotoKeluar"));
            $foto_keluar->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if (file_exists($request->fotoKeluarLama)) {
                unlink($request->fotoKeluarLama);
            }
            $foto_keluar->save("../gambar/siswa/fotoKeluar/foto_keluar" . $fileName, 100);
            $data["fotoKeluar"] = "gambar/siswa/fotoKeluar/foto_keluar" . $fileName;
        }
        // else {
        //     $data["fotoKeluar"] = $request->fotoKeluarLama;
        // }

        $update = DB::table("siswa")
            ->where("nikSiswa", $request->nik)
            ->update($data);

        if ($update == 0 || $update == 1) {
            return 1;
        } else {
            return "k";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    // public function show(Student $student)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    // public function edit(Student $student)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Student $student)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Student $student)
    // {
    //     //
    // }
}
