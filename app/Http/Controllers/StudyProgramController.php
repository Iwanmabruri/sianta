<?php

namespace App\Http\Controllers;

use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class StudyProgramController extends Controller
{
    public function index()
    {
        return view('jurusan.index');
    }

    public function dataProgram(Request $req)
    {
        $data = DB::table("program_keahlian")->where('status','=','aktif');
        $datatable =  DataTables::of($data);
        return $datatable
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $bt = '
            <div class="btn-group" role="group" aria-label="Basic example">
                <button id="' . $row->id_program_keahlian .'" class="edit btn btn-info btn-xs" type="button">edit</button>
                <button id="' . $row->id_program_keahlian .'" class="hapus btn btn-warning btn-xs" type="button">hapus</button>
            </div>
                
                ';
                return $bt . "";
            })
            ->addColumn('konsentrasiKeahlian', function ($row) {
                $a = $row->konsentrasi_keahlian;
                return $a . "";
            })
            ->addColumn('bidangKeahlian', function ($row) {
                $a = $row->bidang_keahlian;
                return $a . "";
            })
            ->addColumn('programKeahlian', function ($row) {
                $a = $row->program_keahlian;
                return $a . "";
            })
            ->addColumn('tahunDibuat', function ($row) {
                $a = $row->tahun_dibuat;
                return $a . "";
            })
            ->addColumn('status', function ($row) {
                $a = '
                <span>'.  $row->status.' </span>
                ';
                return $a . "";
            })
            ->rawColumns(['action','bidangKeahlian','konsentrasiKeahlian','programKeahlian','tahunDibuat','status'])
            ->make(true);
    }
    
    public function form_data_progKeh()
    {
        return view('jurusan.form_data');
    }
    public function form_data_progKeh2($id)
    {
        return view('jurusan.form_data2', compact("id"));
    }

    public function simpanProgKeh(Request $req)
    {
        $data = array();
        $data["bidang_keahlian"] = strtoupper($req->bidKeh);
        $data["program_keahlian"] = strtoupper($req->progKeh);
        $data["konsentrasi_keahlian"] = strtoupper($req->konsKeh);
        $data["tahun_dibuat"] = $req->thn;
        $data["status"] = "aktif";
        $tambah = DB::table("program_keahlian")->insert($data);
        if ($tambah) {
            return "S";
        } else {
            return "k";
        }
    }

    public function editProgKeh(Request $req)
    {
        $data = array();
        $data["bidang_keahlian"] = strtoupper($req->bidKeh);
        $data["program_keahlian"] = strtoupper($req->progKeh);
        $data["konsentrasi_keahlian"] = strtoupper($req->konsKeh);
        $data["tahun_dibuat"] = $req->thn;
        $tambah = DB::table("program_keahlian")->where('id_program_keahlian','=',$req->id)->update($data);
        if ($tambah) {
            return "S";
        } else {
            return "k";
        }
    }

    public function hapusProgKeh(Request $req)
    {
        $data = array();
        $data["status"] = "tidak";
        $tambah = DB::table("program_keahlian")->where('id_program_keahlian','=',$req->id)->update($data);
        if ($tambah) {
            return "S";
        } else {
            return "k";
        }
    }

}
