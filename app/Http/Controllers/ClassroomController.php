<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kelas.index');
    }

    public function dataKelas(Request $req) {
        $data = DB::table("kelas")
        ->join('pegawai', 'kelas.id_pegawai', '=', 'pegawai.id_pegawai')
        ->join('tahun_ajaran', 'kelas.id_tahun_ajaran', '=', 'tahun_ajaran.id_tahun_ajaran')
        ->join('program_keahlian', 'kelas.id_program_keahlian', '=', 'program_keahlian.id_program_keahlian')
        ->select('kelas.id_kelas as idK', 'kelas.id_pegawai as idP', 'kelas.id_tahun_ajaran as idT',
        'kelas.id_program_keahlian as idProg', 'kelas.kelas as kls', 'kelas.ruang as rag', 'kelas.status as sts',
        'pegawai.nmPeg as namaPegawai', 'tahun_ajaran.tahun_ajaran as thnAjr', 'program_keahlian.program_keahlian as progKeah')
        ->where('kelas.status','=', 'aktif');
        $datatable =  DataTables::of($data);
        return $datatable
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $bt = '
            <div class="btn-group" role="group" aria-label="Basic example">
                <button id="' . $row->idK .'" class="edit btn btn-info btn-xs" type="button">edit</button>
                <button id="' . $row->idK .'" class="hapus btn btn-warning btn-xs" type="button">hapus</button>
                <button id="' . $row->idK .'" class="detail btn btn-success btn-xs" type="button">detail</button>
            </div>
                
                ';
                return $bt . "";
            })
            ->addColumn('kelas', function ($row) {
                $a = $row->kls;
                return $a . "";
            })
            ->addColumn('ruang', function ($row) {
                $a = $row->rag;
                return $a . "";
            })
            ->addColumn('waliKelas', function ($row) {
                $a = $row->namaPegawai;
                return $a . "";
            })
            ->addColumn('progKeahlian', function ($row) {
                $a = $row->progKeah;
                return $a . "";
            })
            ->addColumn('tahunAjaran', function ($row) {
                $a = $row->thnAjr;
                return $a . "";
            })
            ->addColumn('status', function ($row) {
                $a = '
                <span>'.  $row->sts.' </span>
                ';
                return $a . "";
            })
            ->rawColumns(['action','kelas','ruang','progKeahlian' ,'tahunAjaran','waliKelas','status'])
            ->make(true);
    }

    public function form_data_kls()
    {
        return view('kelas.create');
    }

    public function form_data_kls2($id)
    {
        return view('kelas.edit', compact("id"));
    }

    public function detail_kls($id)
    {
        return view('kelas.detailKelas', compact("id"));
    }

    public function simpanKls(Request $req) {
        $data = array();
        $data["id_pegawai"] = $req->walikls;
        $data["id_tahun_ajaran"] = $req->thn_ajr;
        $data["id_program_keahlian"] = $req->prog_keah;
        $data["kelas"] = $req->kls;
        $data["ruang"] = $req->ruang;
        $data["status"] = "aktif";
        $tambah = DB::table("kelas")->insert($data);
        if ($tambah) {
            return "S";
        } else {
            return "k";
        }
    }

    public function editKls(Request $req) {
        $data = array();
        $data["id_pegawai"] = $req->walikls;
        $data["id_tahun_ajaran"] = $req->thn_ajr;
        $data["id_program_keahlian"] = $req->prog_keah;
        $data["kelas"] = $req->kls;
        $data["ruang"] = $req->ruang;
        $tambah = DB::table("kelas")
        ->where('id_kelas', '=', $req->id)
        ->update($data);
        if ($tambah) {
            return "S";
        } else {
            return "k";
        }
    }


    public function hapusKls(Request $req) {
        $data = array();
        $data["status"] = "tidak";
        $tambah = DB::table("kelas")
        ->where('id_kelas', '=', $req->id)
        ->update($data);
        if ($tambah) {
            return "S";
        } else {
            return "k";
        }
    }

    
}
