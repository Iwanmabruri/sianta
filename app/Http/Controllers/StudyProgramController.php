<?php

namespace App\Http\Controllers;

use App\Models\StudyProgram;
use Illuminate\Http\Request;

class StudyProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $study = StudyProgram::all();
        return view('jurusan.index', compact('study'));
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
        // StudyProgram::create([
        //     'nmProdi=>$request->nmProdi',
        //     'konsKeahlian=>$request->konsKeahlian'
        // ]);
        StudyProgram::query()->create($request->all());
        return view('jurusan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudyProgram  $studyProgram
     * @return \Illuminate\Http\Response
     */
    public function show(StudyProgram $studyProgram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudyProgram  $studyProgram
     * @return \Illuminate\Http\Response
     */
    public function edit(StudyProgram $studyProgram)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudyProgram  $studyProgram
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudyProgram $studyProgram)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudyProgram  $studyProgram
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudyProgram $idProdi)
    {
        // StudyProgram::query()->findOrFail($id)->delete();
        $delProdi = StudyProgram::find($idProdi);
        $delProdi->delete();

        return back();
        
    }
}
