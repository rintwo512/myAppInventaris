<?php

namespace App\Http\Controllers;

use App\Models\ProjectM;
use Illuminate\Http\Request;

class ProjectmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projectManagament.index', [
            'title' => "Project Managament",
            'datas' => ProjectM::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projectManagament.create', [
            'title' => "Create Data"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateProjrctM = $request->validate([
            'jenis_pek' => 'required',
            'lokasi_pek' => 'required',
            'petugas_pek' => 'required',
            'detail_pek' => 'required',           
            'status_pek' => 'required'
        ]);

       

        $validateProjrctM =
            [
                'jenis_pek' => $request->jenis_pek,
                'lokasi_pek' => $request->lokasi_pek,
                'petugas_pek' => $request->petugas_pek,
                'detail_pek' => $request->detail_pek,
                'des_pek' => $request->des_pek,
                'tgl_mulai_pek' => $request->tgl_mulai,
                'tgl_akhir_pek' => $request->tgl_selesai,
                'status_pek' => $request->status_pek
            ];

        ProjectM::create($validateProjrctM);
   
        return redirect('/project')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectM  $projectM
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectM $projectM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectM  $projectM
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        
        $rules = [
            'jenis_pek' => 'required',
            'lokasi_pek' => 'required',
            'petugas_pek' => 'required',
            'detail_pek' => 'required',
            'tgl_mulai' => 'required',
            // 'tgl_selesai' => 'required',
            'status_pek' => 'required',
        ];

        $newData = $request->validate($rules);
        $newData = [
            "jenis_pek" => Request()->jenis_pek,
            "lokasi_pek" => $request->lokasi_pek,
            "petugas_pek" => Request()->petugas_pek,
            "detail_pek" => $request->detail_pek,
            "des_pek" => $request->des_pek,
            "tgl_mulai_pek" => $request->tgl_mulai,
            "tgl_akhir_pek" => $request->tgl_selesai,
            "status_pek" => $request->status_pek
        ];

       
        ProjectM::where('id', $id)->update($newData);
        return back()->with("success", "Data berhasil diupdate!");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectM  $projectM
     * @return \Illuminate\Http\Response
     */
    public function update()
    {

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectM  $projectM
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectM $projectM, $id)
    {
        ProjectM::destroy($id);         
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
