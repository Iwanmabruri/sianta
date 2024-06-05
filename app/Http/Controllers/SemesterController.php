<?php

namespace App\Http\Controllers;

use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;


class SemesterController extends Controller
{
    public function index() {
        return view('semester.index');
    }

    public function dataSemester(Request $req)
    {
        $data = DB::table("semester")
        ->join('tahun_ajaran', 'semester.id_semester', '=', 'tahun_ajaran.id_tahun_ajaran')
        ->select('semester.id_semester as idS', 'semester.semester as smt', 'semester.status as sts', 'semester.nama_semester as nmSmt',
        'tahun_ajaran.id_tahun_ajaran as thnId', 'tahun_ajaran.keterangan as ketThn', 'tahun_ajaran.tahun_ajaran as thn')
        ->where('semester.status','=','aktif');
        $datatable =  DataTables::of($data);
        return $datatable
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $bt = '
            <div class="btn-group" role="group" aria-label="Basic example">
                <button id="' . $row->idS .'" class="edit btn btn-info btn-xs" type="button">edit</button>
                <button id="' . $row->idS .'" class="hapus btn btn-warning btn-xs" type="button">hapus</button>
            </div>
                
                ';
                return $bt . "";
            })
            ->addColumn('semester', function ($row) {
                $a = $row->smt;
                return $a . "";
            })
            ->addColumn('namaSemester', function ($row) {
                $a = $row->nmSmt;
                return $a . "";
            })
            ->addColumn('tahunAjaran', function ($row) {
                $b = $row->thn;
                return $b. "";
            })
            ->addColumn('status', function ($row) {
                $a = '
                <span>'.  $row->sts.' </span>
                ';
                return $a . "";
            })
            ->rawColumns(['action', 'semester','namaSemester','tahunAjaran','status'])
            ->make(true);
    }

    public function form_data_smt() {
        return view('semester.form_data');
    }
    public function form_data_smt2($id) {
        return view('Semester.form_data2', compact("id"));
    }

    public function simpanSmt(Request $req) {
        $data = array();
        $data["id_tahun_ajaran"] = $req->thn_ajr;
        $data["semester"] = $req->smt;
        $data["nama_semester"] = $req->nmSmt;
        $data["status"] = "aktif";
        $tambah = DB::table("semester")->insert($data);
        if ($tambah) {
            return "S";
        } else {
            return "k";
        }
    }

    public function editSmt(Request $req) {
        $data = array();
        $data["id_tahun_ajaran"] = $req->thn_ajr;
        $data["semester"] = $req->smt;
        $data["nama_semester"] = $req->nmSmt;
        $data["status"] = "aktif";
        $tambah = DB::table("semester")->where('id_semester','=',$req->id)->update($data);
        if ($tambah) {
            return "S";
        } else {
            return "k";
        }
    }

    public function hapusSmt(Request $req) {
        $data = array();
        $data["status"] = "tidak";
        $tambah = DB::table("semester")->where('id_semester','=',$req->id)->update($data);
        if ($tambah) {
            return "S";
        } 
    }
}
