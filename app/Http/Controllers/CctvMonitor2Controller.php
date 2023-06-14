<?php

namespace App\Http\Controllers;

use App\Models\CctvMonitor2;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Cctv2Export;

class CctvMonitor2Controller extends Controller
{

    public function store(Request $request)
    {
        $validateNewData = $request->validate([
            'lokasi2' => 'required',
            'merk2' => 'required',
            'type2' => 'required',
            'status2' => 'required'
        ]);

        $validateNewData =
            [
                'lokasi' => $request->lokasi2,
                'merk' => $request->merk2,
                'type' => $request->type2,
                'status' => $request->status2,
                'resolusi' => $request->resolusi2,
                'tgl_pemasangan' => $request->tgl_pemasangan2,
                'petugas_pemasangan' => $request->petugas_pemasangan2,
                'kerusakan' => $request->kerusakan2,
                'sandi_dvr' => $request->sandi_dvr2,
                'user_id' => auth()->user()->id
            ];
        CctvMonitor2::create($validateNewData);
        return back()->with('success', 'Data berhasil di tambah!');
    }

    public function show($id) //Method show menggantikan method destroy
    {
        CctvMonitor2::where('id', $id)->update(['user_delete' => auth()->user()->name]);
        CctvMonitor2::find($id)->delete();
        return back()->with('success', 'Data berhasil di hapus!');
    }

    public function edit($id)
    {
        $cctv2 = CctvMonitor2::find($id);
        return view('cctv.monitor2.update', [
            'title' => 'Update Data CCTV Monitor 2',
            'dataCctv2' => $cctv2
        ]);
    }


    public function update(Request $request, $id)
    {
        $newData = [
            'lokasi' => $request->lokasi2,
            'merk' => $request->merk2,
            'type' => $request->type2,
            'resolusi' => $request->resolusi2,
            'status' => $request->status2,
            'tgl_pemasangan' => $request->tgl_pemasangan2,
            'petugas_pemasangan' => $request->petugas_pemasangan2,
            'tgl_perbaikan' => $request->tgl_perbaikan2,
            'petugas_perbaikan' => $request->petugas_perbaikan2,
            'catatan' => $request->catatan2,
            'sandi_dvr' => $request->sandi_dvr2,
            'kerusakan' => $request->kerusakan2,
            'user_updated' => auth()->user()->name,
            'updated_time' => Carbon::now()
        ];

        CctvMonitor2::where('id', $id)->update($newData);
        return redirect('/dashboard/cctv')->with('success', 'Data berhasil di ubah!');
    }

    public function trash()
    {
        $dataTrashMonitor2 = CctvMonitor2::onlyTrashed()->get();
        return view('cctv.monitor2.trashed', [
            'title' => 'Trashed CCTV',
            'dataTrashMonitor2' => $dataTrashMonitor2
        ]);
    }

    public function restoreDataCctv2($id)
    {
        CctvMonitor2::onlyTrashed()->where('id', $id)->restore();

        return response()->json(['success' => 'berhasil']);
    }

    public function queryRangeCctv2($nilai)
    {

        $start = substr($nilai, 0, 10);
        $end = substr($nilai, 13, 24);

        $rangeCctv2 = CctvMonitor2::whereBetween('updated_time', [$start, $end])->get();
        return response()->json($rangeCctv2);
    }

    public function deleteAllCctv2()
    {
        CctvMonitor2::onlyTrashed()->forceDelete();
        return back()->with('success', 'Data berhasil di hapus permanen!');
    }

    public function exportDataCctv2()
    {
        return Excel::download(new Cctv2Export, 'data-cctv-monitor2.xlsx');
    }
}
