<?php

namespace App\Http\Controllers;

use App\Models\ClassroomStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ClassroomStudentController extends Controller
{
    public function kelasSiswaData(Request $req)
    {
        $data = DB::table("kelas")
        ->join('pegawai', 'kelas.nik_peg', '=', 'pegawai.nikPeg')
        ->select('kelas.id_kelas as idKelas', 'kelas.nama_kelas as name', 'kelas.nik_peg as nikpeg', 'pegawai.nmPeg as namaPeg');
        $datatable =  DataTables::of($data);
        return $datatable
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $bt = '
            <div class="btn-group" role="group" aria-label="Basic example">
                <button id="' . $row->idKelas . '" nikpeg="' . $row->nikpeg . '"  class="setting btn btn-info btn-xs" type="button">setting</button>
            </div>
                
                ';
                return $bt . "";
            })
            ->addColumn('nama', function ($row) {
                $a = $row->name;
                return $a . "";
            })
            ->addColumn('jml', function ($row) {
                $t = DB::table("sisperKelas")->where('nikPeg', '=', $row->nikpdeg)->count();
                return $t . "";
            })
            ->addColumn('wlKls', function ($row) {
                $a = $row->namaPeg;
                return $a . "";
            })
            ->rawColumns(['action', 'nama','jml','wlKls'])
            ->make(true);
    }

    public function autocomplete(Request $req)
    {
        if ($req->ajax()) {
            $data = DB::table("pegawai")->where('nikPeg', 'like', $req->input1 . "%")->get();
            $output = '';
            if (count($data) > 0) {
                $output = '<ul id="pg" class="list-group" style="display: block; position: relative; z-index: 1">';
                foreach ($data as $row) {
                    $output .= '<li class="list-group-item pg" data-pg=' . $row->nmPeg . ' data-pg2=' . $row->nikPeg . '>' . $row->nmPeg . '</li>';
                }
                $output .= '</ul>';
            } else {
                $output .= '<li class="list-group-item">' . 'No Data Found' . '</li>';
            }
            return $output;
        }
        // return view('autosearch');
    }

    public function loopSiswa()
    {
        $data = DB::table("siswa");
        $datatable =  DataTables::of($data);
        return $datatable
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $bt = "
                <input type='checkbox' id='nik_s' class='nik_s' name='nik_s' dt-nama='" . $row->namaSiswa . "' dt-alamat='" . $row->detAlamat . "' value='" . $row->nikSiswa . "'>
                ";
                return $bt . "";
            })
            ->addColumn('nama', function ($row) {
                $a = $row->namaSiswa;
                return $a . "";
            })
            ->addColumn('alamat', function ($row) {
                $a = $row->detAlamat;
                return $a . "";
            })
            ->rawColumns(['action', 'nama', 'alamat'])
            ->make(true);
    }

    public function index()
    {
        return view('kelasSiswa.index');
    }

    public function getKelas(Request $req) {
        $idthn = $req->thn;
        $idprog = $req->prog;
        return view('kelasSiswa.getKelas', compact("idthn","idprog"));
    }

    public function form_data()
    {
        return view('kelasSiswa.form_data');
    }

    public function store(Request $req)
    {
        $data = array();
        $no =  $req->nik;
        for ($i = 0; $i < $no; $i++) {
            dd($i);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassroomStudent  $classroomStudent
     * @return \Illuminate\Http\Response
     */
    public function show(ClassroomStudent $classroomStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassroomStudent  $classroomStudent
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassroomStudent $classroomStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassroomStudent  $classroomStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassroomStudent $classroomStudent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassroomStudent  $classroomStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassroomStudent $classroomStudent)
    {
        //
    }
}
