<?php

namespace App\Http\Controllers;

use App\Models\Mutation;
use Illuminate\Http\Request;

class MutationController extends Controller
{
    public function index()
    {
        return view('mutasi.index');
    }

    public function dataMutasi(Request $req)
    {
        $data = DB::table("mutasi")->where('status','=','aktif');
        $datatable =  DataTables::of($data);
        return $datatable
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $bt = '
            <div class="btn-group" role="group" aria-label="Basic example">
                <button id="' . $row->id_tahun_ajaran .'" class="edit btn btn-info btn-xs" type="button">edit</button>
                <button id="' . $row->id_tahun_ajaran .'" class="hapus btn btn-warning btn-xs" type="button">hapus</button>
            </div>
                
                ';
                return $bt . "";
            })
            ->addColumn('tahunAjaran', function ($row) {
                $a = $row->tahun_ajaran;
                return $a . "";
            })
            ->addColumn('keterangan', function ($row) {
                $a = $row->keterangan;
                return $a . "";
            })
            ->addColumn('status', function ($row) {
                $a = '
                <span>'.  $row->status.' </span>
                ';
                return $a . "";
            })
            ->rawColumns(['action', 'tahunAjaran','keterangan','status'])
            ->make(true);
    }

    public function tambah_mutasi()
    {
        return view('mutasi.add_mutasi');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mutation  $mutation
     * @return \Illuminate\Http\Response
     */
    public function show(Mutation $mutation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mutation  $mutation
     * @return \Illuminate\Http\Response
     */
    public function edit(Mutation $mutation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mutation  $mutation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mutation $mutation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mutation  $mutation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mutation $mutation)
    {
        //
    }
}
