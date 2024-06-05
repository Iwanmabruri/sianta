<?php

namespace App\Http\Controllers;

use App\Models\Mutation;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class MutationController extends Controller
{
    public function index()
    {
        return view('mutasi.index');
    }

    public function dataMutasi(Request $req)
    {
        $data = DB::table("mutasi")
        ->join('siswa', 'mutasi.id_mutasi', '=', 'siswa.id_siswa')
        ->join('kelas', 'mutasi.id_mutasi', '=', 'kelas.id_kelas')
        ->join('program_keahlian', 'mutasi.id_mutasi', '=', 'program_keahlian.id_program_keahlian')
        ->select('mutasi.id_mutasi as idM', 'mutasi.tglMutasi as tglMts', 'mutasi.noSuratMutasi as NSM', 'mutasi.pindah as PN',
        'mutasi.AlasanPindah as AP', 'mutasi.suratPernyataan as SP', 'siswa.namaSiswa as NS', 'kelas.kelas as KLS');
        $datatable =  DataTables::of($data);
        return $datatable
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $bt = '
            <div class="btn-group" role="group" aria-label="Basic example">
                <button id="' . $row->idM .'" class="edit btn btn-info btn-xs" type="button">edit</button>
            </div>
                
                ';
                return $bt . "";
            })
            ->addColumn('nama', function ($row) {
                $a = $row->NS;
                return $a . "";
            })
            ->addColumn('kelas', function ($row) {
                $b = $row->KLS;
                return $b . "";
            })
            ->addColumn('tgl', function ($row) {
                $c = $row->tglMts;
                return $c . "";
            })
            ->addColumn('pindah', function ($row) {
                $d = $row->PN;
                return $d . "";
            })
            ->addColumn('alasanPindah', function ($row) {
                $e = $row->AP;
                return $e . "";
            })
            ->rawColumns(['action', 'nama','kelas','tgl','pindah','alasanPindah'])
            ->make(true);
    }

    public function updateMutasi($id)
    {
        return view('mutasi.update_mutasi', compact("id"));
    }

    public function addMutasi($id)
    {
        return view('mutasi.add_mutasi', compact("id"));
    }

    public function uploadBerkasMutasi(Request $request) {
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

        if ($request->file('suratPernyataan') != "") {
            $surat_pernyataan = Image::make($request->file("suratPernyataan"));
            $surat_pernyataan->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if (file_exists($request->suratPernyataanLama)) {
                unlink($request->suratPernyataanLama);
            }
            $surat_pernyataan->save("../gambar/siswa/suratPernyataan/surat_pernyataan" . $fileName, 100);
            $data["suratPernyataan"] = "gambar/siswa/suratPernyataan/surat_pernyataan" . $fileName;
        } else {
            $data["suratPernyataan"] = $request->suratPernyataanLama;
        }

        if ($request->file('berkasVideo') != "") {
            $berkas_video = Image::make($request->file("berkasVideo"));
            $berkas_video->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if (file_exists($request->berkasVideoLama)) {
                unlink($request->berkasVideoLama);
            }
            $berkas_video->save("../gambar/siswa/berkasVideo/berkas_video" . $fileName, 100);
            $data["berkasVideo"] = "gambar/siswa/berkasVideo/berkas_video" . $fileName;
        } else {
            $data["berkasVideo"] = $request->berkasVideoLama;
        }

        if ($request->file('suratMutasi') != "") {
            $surat_mutasi = Image::make($request->file("suratMutasi"));
            $surat_mutasi->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if (file_exists($request->suratMutasiLama)) {
                unlink($request->suratMutasiLama);
            }
            $surat_mutasi->save("../gambar/siswa/suratMutasi/surat_mutasi" . $fileName, 100);
            $data["suratMutasi"] = "gambar/siswa/suratMutasi/surat_mutasi" . $fileName;
        } else {
            $data["suratMutasi"] = $request->suratMutasiLama;
        }

        $update = DB::table("mutasi")
            ->where("id_mutasi", $request->id)
            ->update($data);

        if ($update == 0 || $update == 1) {
            return 1;
        } else {
            return "k";
        }
    }


    public function simpanMutasi(Request $req)
    {
        $data = array();
        $data["id_siswa"] = $req->idS;
        $data["id_kelas"] = $req->kelas;
        $data["id_program_keahlian"] = $req->progKeah;
        $data["tglMutasi"] = $req->tanggal;;
        $data["noSuratMutasi"] = $req->noSurat;;
        $data["pindah"] = $req->pindah;;
        $data["AlasanPindah"] = $req->alasan;;
        $data["suratPernyataan"] = "";
        $data["berkasVideo"] = "";
        $data["suratMutasi"] = "";
        $tambah = DB::table("mutasi")->insert($data);
        $datas = array();
        $datas["status"] = "Tidak";
        $update = DB::table("siswa")->where('id_siswa',$req->idS)->update($datas);
        if ($tambah) {
            return "S";
        } else {
            return "k";
        }
    }
}
