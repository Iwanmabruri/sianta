<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Intervention\Image\Facades\Image;



class EmployeeController extends Controller
{
    function pegawai_data()
    {
        $data = DB::table("pegawai")->where('status','=','aktif');
        $datatable =  DataTables::of($data);
        return $datatable
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $bt = '
            <div class="btn-group" role="group" aria-label="Basic example">
                <button id="' . $row->id_pegawai . '" class="edit btn btn-info btn-xs" type="button">edit</button>
                <button id="' . $row->id_pegawai . '" class="detail btn btn-primary btn-xs"  type="button">detail</button>
                <button id="' . $row->id_pegawai . '" class="upload btn btn-warning btn-xs"  type="button">upload</button>
                <button id="' . $row->id_pegawai . '" class="hapus btn btn-danger btn-xs"  type="button">hapus</button>
            </div>
                
                ';
                return $bt . "";
            })
            ->addColumn('nik', function ($row) {
                $a = $row->nikPeg;
                return $a . "";
            })
            ->addColumn('nama', function ($row) {
                $a = $row->nmPeg;
                return $a . "";
            })
            ->addColumn('almt', function ($row) {
                $a = $row->alamat;
                return $a . "";
            })
            ->addColumn('berkas', function ($row) {
                if ($row->ijazah == "") {
                    $fts = "<span class='text-danger'>Tidak Ada</span>";
                } else {
                    $fts =  "<span class='text-success'>Ada</span>";
                }

                return $fts . "";
            })
            ->addColumn('sts', function ($row) {
                $a = $row->status;
                return $a . "";
            })
            ->rawColumns(['action', 'nik', 'nama', 'almt', 'berkas','status'])
            ->make(true);
    }

    public function index()
    {
        return view('pegawai.index');
    }

    public function form_data()
    {
        return view('pegawai.form_data');
    }

    public function form_data2($id)
    {

        return view('pegawai.form_data2', compact("id"));
    }

    public function form_upload($id)
    {

        return view('pegawai.form_upload', compact("id"));
    }

    public function store(Request $req)
    {
        $validasiNIK = DB::table("pegawai")
            ->where("nikPeg", "=", $req->nik_p)
            ->count();
        $validasiNIY = DB::table("pegawai")
            ->where("niyPeg", "=", $req->niy_p)
            ->count();
        if ($validasiNIK > 0) {
            return "N";
        } elseif ($validasiNIY > 0) {
            return "Y";
        } else {
            $data = array();
            $data["nikPeg"] = $req->nik_p;
            $data["nmPeg"] = $req->nama_p;
            $data["niyPeg"] = $req->niy_p;
            $data["ttl"] = $req->thn_p . "-" . $req->bln_p . "-" . $req->tgl_p;
            $data["alamat"] = $req->alamat;
            $data["jk"] = $req->jenkel;
            $data["noHp"] = $req->noHp_p;
            $data["tugTambahan"] = $req->tug_t;
            $data["PtkGtk"] = $req->ptkgtk;
            $data["tmt"] = $req->tmt;
            $data["ijazah"] = "";
            $data["tahun_masuk"] = $req->thn_masuk;
            $data["tahun_keluar"] = "";
            $data["status"] = "aktif";
            $tambah = DB::table("pegawai")->insert($data);
            if ($tambah) {
                return "S";
            }
        }
    }

    public function show($id)
    {
        return view('pegawai.form_detail', compact("id"));
    }

    public function update(Request $req)
    {
        $data = array();
        $data["nmPeg"] = $req->nama_p;
        $data["niyPeg"] = $req->niy_p;
        $data["ttl"] = $req->thn_p . "-" . $req->bln_p . "-" . $req->tgl_p;
        $data["alamat"] = $req->alamat;
        $data["jk"] = $req->jenkel;
        $data["noHp"] = $req->noHp_p;
        $data["tugTambahan"] = $req->tug_t;
        $data["PtkGtk"] = $req->ptkgtk;
        $data["tmt"] = $req->tmt;
        $data["tahun_masuk"] = $req->thn_masuk;
        $tambah = DB::table("pegawai")
            ->where('id_pegawai', '=', $req->id)
            ->update($data);
        if ($tambah) {
            return "S";
        }
    }

    public function upload_data(Request $req)
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

        $filename1 = rand(00000, 99999) . acakangkahuruf(1) . ".jpg";

        if ($req->file("ft_ijazah") != "") {
            $ft_ijazah = Image::make($req->file("ft_ijazah"));
            $ft_ijazah->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if (file_exists($req->ft_ijazah_lama)) {
                unlink($req->ft_ijazah_lama);
            }
            $ft_ijazah->save("../gambar/pegawai/ijazah/" . $filename1, 100);
            $data["ijazah"] = "gambar/pegawai/ijazah/" . $filename1;
        } else {
            $data["ijazah"] = $req->ft_ijazah_lama;
        }


        $simpan = DB::table("pegawai")
            ->where("nikPeg", "=", $req->nik_p)
            ->update($data);
        if ($simpan) {
            return "1";
        } else {
            return "2";
        }
    }

    public function hapusPeg(Request $req) {
        $data = array();
        $data["status"] = "tidak";
        $tambah = DB::table("pegawai")->where('id_pegawai','=',$req->id)->update($data);
        if ($tambah) {
            return "S";
        } 
    }
}
