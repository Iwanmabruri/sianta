<?php

namespace App\Http\Controllers;

use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;


class TahunAjaranController extends Controller
{
    public function index() {
        return view('tahunAjaran.index');
    }

    public function dataTahunAjaran(Request $req)
    {
        $data = DB::table("tahun_ajaran");
        $datatable =  DataTables::of($data);
        return $datatable
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $bt = '
            <div class="btn-group" role="group" aria-label="Basic example">
                <button id="' . $row->id_tahun_ajaran .'" class="edit btn btn-info btn-xs" type="button">edit</button>
            </div>
                
                ';
                return $bt . "";
            })
            ->addColumn('tahunAjaran', function ($row) {
                $a = $row->tahun_ajaran;
                return $a . "";
            })
            ->addColumn('namaTahunAjaran', function ($row) {
                $a = $row->nama_tahun_ajaran;
                return $a . "";
            })
            ->addColumn('status', function ($row) {
                $a = '
                <span>'.  $row->status.' </span>
                ';
                return $a . "";
            })
            ->rawColumns(['action', 'tahunAjaran','namaTahunAjaran','status'])
            ->make(true);
    }

    public function form_data_thn() {
        return view('tahunAjaran.form_data');
    }
    public function form_data_thn2($id) {
        return view('tahunAjaran.form_data2', compact("id"));
    }

    public function simpan(Request $req) {
        $data = array();
        $data["nama_tahun_ajaran"] = $req->nm_thn_ajr;
        $data["tahun_ajaran"] = $req->thn_ajr1."-".$req->thn_ajr2;
        $data["status"] = "aktif";
        $tambah = DB::table("tahun_ajaran")->insert($data);
        if ($tambah) {
            return "S";
        } else {
            return "k";
        }
    }
}
