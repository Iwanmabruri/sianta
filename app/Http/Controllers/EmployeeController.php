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
            ->addColumn('action', function ($row) {
                $a = '<a href="/blank" class="edit btn btn-primary btn-sm">View</a>';
                return $a . "";
            })
            ->rawColumns(['nik', 'nama', 'alamat', 'action'])
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
