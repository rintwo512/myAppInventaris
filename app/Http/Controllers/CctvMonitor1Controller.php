<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\Cctv1Export;
use App\Models\CctvMonitor1;
use App\Models\CctvMonitor2;
use App\Models\CctvMonitor3;
use App\Models\CctvMonitor4;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class CctvMonitor1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // dd(User::find(1)->userDataCctv);

        // CctvMonitor4::onlyTrashed()->restore();

        return view('cctv.monitor1.index', [
            'title' => 'Data CCTV',
            'dataCctv1' => CctvMonitor1::all(),
            'dataCctv2' => CctvMonitor2::all(),
            'dataCctv3' => CctvMonitor3::all(),
            'dataCctv4' => CctvMonitor4::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $dataTrashMonitor1 = CctvMonitor1::onlyTrashed()->get();
        return view('cctv.monitor1.trashed', [
            'title' => 'Trashed CCTV',
            'dataTrashMonitor1' => $dataTrashMonitor1
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
        $validateNewData = $request->validate([
            'lantai' => 'required',
            'wing' => 'required',
            'lokasi' => 'required',
            'merk' => 'required',
            'type' => 'required',
            'status' => 'required'
        ]);

        // $validateNewData = $request->validate($rules);
        $validateNewData =
            [
                'lantai' => $request->lantai,
                'wing' => $request->wing,
                'lokasi' => $request->lokasi,
                'merk' => $request->merk,
                'type' => $request->type,
                'status' => $request->status,
                'resolusi' => $request->resolusi,
                'tgl_pemasangan' => $request->tgl_pemasangan,
                'petugas_pemasangan' => $request->petugas_pemasangan,
                'kerusakan' => $request->kerusakan,
                'sandi_dvr' => $request->sandi_dvr,
                'user_id' => auth()->user()->id
            ];
        CctvMonitor1::create($validateNewData);
        return back()->with('success', 'Data berhasil di tambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //Method show menggantikan method destroy
    {
        CctvMonitor1::where('id', $id)->update(['user_delete' => auth()->user()->name]);
        CctvMonitor1::find($id)->delete();
        return back()->with('success', 'Data berhasil di hapus!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cctv1 = CctvMonitor1::find($id);
        return view('cctv.monitor1.update', [
            'title' => 'Update Data CCTV Monitor 1',
            'dataCctv1' => $cctv1
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newData = [
            'lantai' => $request->lantai,
            'wing' => $request->wing,
            'lokasi' => $request->lokasi,
            'merk' => $request->merk,
            'type' => $request->type,
            'resolusi' => $request->resolusi,
            'status' => $request->status,
            'tgl_pemasangan' => $request->tgl_pemasangan,
            'petugas_pemasangan' => $request->petugas_pemasangan,
            'tgl_perbaikan' => $request->tgl_perbaikan,
            'petugas_perbaikan' => $request->petugas_perbaikan,
            'catatan' => $request->catatan,
            'sandi_dvr' => $request->sandi_dvr,
            'kerusakan' => $request->kerusakan,
            'user_updated' => auth()->user()->name,
            'updated_time' => Carbon::now()
        ];

        CctvMonitor1::where('id', $id)->update($newData);
        return redirect('dashboard/cctv')->with('success', 'Data berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function restoreDataCctv1($id)
    {
        CctvMonitor1::onlyTrashed()->where('id', $id)->restore();

        return response()->json(['success' => 'berhasil']);
    }

    public function deleteAll()
    {
        CctvMonitor1::onlyTrashed()->forceDelete();
        return back()->with('success', 'Data berhasil di hapus permanen!');
    }

    public function exportDataCctv1()
    {
        return Excel::download(new Cctv1Export, 'data-cctv-monitor1.xlsx');
    }

    public function queryRange(Request $request, $nilai)
    {

        $start = substr($nilai, 0, 10);
        $end = substr($nilai, 13, 24);

        $range = CctvMonitor1::whereBetween('updated_time', [$start, $end])->get();
        return response()->json($range);
    }
}
