<?php

namespace App\Http\Controllers;

use App\Models\CctvMonitor4;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Cctv4Export;

class CctvMonitor4Controller extends Controller
{


    public function store(Request $request)
    {
        $validateNewData = $request->validate([
            'lokasi4' => 'required',
            'merk4' => 'required',
            'type4' => 'required',
            'status4' => 'required'
        ]);

        $validateNewData =
            [
                'lokasi' => $request->lokasi4,
                'merk' => $request->merk4,
                'type' => $request->type4,
                'status' => $request->status4,
                'resolusi' => $request->resolusi4,
                'tgl_pemasangan' => $request->tgl_pemasangan4,
                'petugas_pemasangan' => $request->petugas_pemasangan4,
                'kerusakan' => $request->kerusakan4,
                'sandi_dvr' => $request->sandi_dvr4,
                'user_id' => auth()->user()->id
            ];
        CctvMonitor4::create($validateNewData);
        return back()->with('success', 'Data berhasil di tambah!');
    }

    public function show($id)
    {
        CctvMonitor4::where('id', $id)->update(['user_delete' => auth()->user()->name]);
        CctvMonitor4::find($id)->delete();
        return back()->with('success', 'Data berhasil di hapus!');
    }


    public function edit($id)
    {
        $cctv4 = CctvMonitor4::find($id);
        return view('cctv.monitor4.update', [
            'title' => 'Update Data CCTV Monitor 4',
            'dataCctv4' => $cctv4
        ]);
    }


    public function update(Request $request, $id)
    {
        $newData = [
            'lokasi' => $request->lokasi4,
            'merk' => $request->merk4,
            'type' => $request->type4,
            'resolusi' => $request->resolusi4,
            'status' => $request->status4,
            'tgl_pemasangan' => $request->tgl_pemasangan4,
            'petugas_pemasangan' => $request->petugas_pemasangan4,
            'tgl_perbaikan' => $request->tgl_perbaikan4,
            'petugas_perbaikan' => $request->petugas_perbaikan4,
            'catatan' => $request->catatan4,
            'sandi_dvr' => $request->sandi_dvr4,
            'kerusakan' => $request->kerusakan4,
            'user_updated' => auth()->user()->name,
            'updated_time' => Carbon::now()
        ];

        CctvMonitor4::where('id', $id)->update($newData);
        return redirect('/dashboard/cctv')->with('success', 'Data berhasil di ubah!');
    }

    public function trash()
    {
        $dataTrashMonitor4 = CctvMonitor4::onlyTrashed()->get();
        return view('cctv.monitor4.trashed', [
            'title' => 'Trashed CCTV',
            'dataTrashMonitor4' => $dataTrashMonitor4
        ]);
    }

    public function restoreDataCctv4($id)
    {
        CctvMonitor4::onlyTrashed()->where('id', $id)->restore();

        return response()->json(['success' => 'berhasil']);
    }

    public function queryRangeCctv4($nilai)
    {

        $start = substr($nilai, 0, 10);
        $end = substr($nilai, 13, 24);

        $rangeCctv4 = CctvMonitor4::whereBetween('updated_time', [$start, $end])->get();
        return response()->json($rangeCctv4);
    }

    public function exportDataCctv4()
    {
        return Excel::download(new Cctv4Export, 'data-cctv-monitor4.xlsx');
    }

    public function deleteAll()
    {
        CctvMonitor4::onlyTrashed()->forceDelete();
        return back()->with('success', 'Data berhasil di hapus permanen!');
    }
}
