<?php

namespace App\Http\Controllers;

use App\Models\NoteAC;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $note = NoteAC::all();
        return view('dataAc.note', [
            'title' => 'Note',
            'dataNote' => $note
        ]);
    }

    public function store(Request $request)
    {
        $validateNewData = $request->validate([
            'aksi' => 'required',
            'petugas' => 'required',
            'tanggal' => 'required'
        ]);

        NoteAC::create($validateNewData);
        return back()->with('success', 'Data berhasil di tambah!');
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'aksi' => 'required',
            'petugas' => 'required',
            'tanggal' => 'required'
        ];

        $data = $request->validate($rules);
        $data = [
            'aksi' => $request->aksi,
            'petugas' => $request->petugas,
            'tanggal' => $request->tanggal,
        ];


        NoteAC::where('id', $id)->update($data);
        return back()->with('success', 'Data berhasil di update!');
    }

    public function destroy($id)
    {
        NoteAC::destroy($id);
        return back()->with('success', 'Data berhasil di hapus!');
    }
}
