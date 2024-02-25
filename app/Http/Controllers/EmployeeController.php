<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{
    function pegawai_data()
    {
        $data = DB::table("pegawai");
        $datatable =  DataTables::of($data);
        return $datatable
            ->addIndexColumn()
            ->addColumn('nik', function ($row) {
                $a = $row->nikPeg;
                return $a . "";
            })
            ->addColumn('nama', function ($row) {
                $a = $row->nmPeg;
                return $a . "";
            })
            ->addColumn('alamat', function ($row) {
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
            ->addColumn('action', function ($row) {
                $bt = '<div class="dropdown">
                <button class="btn btn-warning btn-xs dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Konfigurasi
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <button id="' . $row->nikPeg . '" class="bt_edit dropdown-item btn-xs" type="button">Edit</button>
                    <button id="' . $row->nikPeg . '" class="bt_detail dropdown-item btn-xs" type="button">Detail</button>
                    <button id="' . $row->nikPeg . '" class="bt_upload dropdown-item btn-xs" type="button">Upload Berkas</button>
                    <button id="' . $row->nikPeg . '" class="bt_print dropdown-item btn-xs" type="button">Print Surat dan Formulir</button>
                    </div>
              </div>';
                return $bt . "";
            })
            ->rawColumns(['nik', 'nama', 'alamat', 'berkas', 'action'])
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
            $tambah = DB::table("pegawai")->insert($data);
            if ($tambah) {
                return "S";
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
