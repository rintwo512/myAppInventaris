<?php

namespace App\Http\Controllers;

use App\Models\CctvMonitor3;
use App\Exports\Cctv3Export;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class CctvMonitor3Controller extends Controller
{


    public function store(Request $request)
    {
        $validateNewData = $request->validate([
            'lantai3' => 'required',
            'wing3' => 'required',
            'lokasi3' => 'required',
            'merk3' => 'required',
            'type3' => 'required',
            'status3' => 'required'
        ]);

        $validateNewData =
            [
                'lantai' => $request->lantai3,
                'wing' => $request->wing3,
                'lokasi' => $request->lokasi3,
                'merk' => $request->merk3,
                'type' => $request->type3,
                'status' => $request->status3,
                'resolusi' => $request->resolusi3,
                'tgl_pemasangan' => $request->tgl_pemasangan3,
                'petugas_pemasangan' => $request->petugas_pemasangan3,
                'kerusakan' => $request->kerusakan3,
                'sandi_dvr' => $request->sandi_dvr3,
                'user_id' => auth()->user()->id
            ];
        CctvMonitor3::create($validateNewData);
        return back()->with('success', 'Data berhasil di tambah!');
    }


    public function show($id) //Method show menggantikan method destroy
    {
        CctvMonitor3::where('id', $id)->update(['user_delete' => auth()->user()->name]);
        CctvMonitor3::find($id)->delete();
        return back()->with('success', 'Data berhasil di hapus!');
    }

    public function edit($id)
    {
        $cctv3 = CctvMonitor3::find($id);
        return view('cctv.monitor3.update', [
            'title' => 'Update Data CCTV Monitor 1',
            'dataCctv3' => $cctv3
        ]);
    }


    public function update(Request $request, $id)
    {
        $newData = [
            'lantai' => $request->lantai3,
            'wing' => $request->wing3,
            'lokasi' => $request->lokasi3,
            'merk' => $request->merk3,
            'type' => $request->type3,
            'resolusi' => $request->resolusi3,
            'status' => $request->status3,
            'tgl_pemasangan' => $request->tgl_pemasangan3,
            'petugas_pemasangan' => $request->petugas_pemasangan3,
            'tgl_perbaikan' => $request->tgl_perbaikan3,
            'petugas_perbaikan' => $request->petugas_perbaikan3,
            'catatan' => $request->catatan3,
            'sandi_dvr' => $request->sandi_dvr3,
            'kerusakan' => $request->kerusakan3,
            'user_updated' => auth()->user()->name,
            'updated_time' => Carbon::now()
        ];

        CctvMonitor3::where('id', $id)->update($newData);
        return redirect('/dashboard/cctv')->with('success', 'Data berhasil di ubah!');
    }


    public function trash()
    {
        $dataTrashMonitor3 = CctvMonitor3::onlyTrashed()->get();
        return view('cctv.monitor3.trashed', [
            'title' => 'Trashed CCTV',
            'dataTrashMonitor3' => $dataTrashMonitor3
        ]);
    }

    public function restoreDataCctv3($id)
    {
        CctvMonitor3::onlyTrashed()->where('id', $id)->restore();

        return response()->json(['success' => 'berhasil']);
    }

    public function deleteAll()
    {
        CctvMonitor3::onlyTrashed()->forceDelete();
        return back()->with('success', 'Data berhasil di hapus permanen!');
    }

    public function queryRangeCctv3($nilai)
    {

        $start = substr($nilai, 0, 10);
        $end = substr($nilai, 13, 24);

        $range = CctvMonitor3::whereBetween('updated_time', [$start, $end])->get();
        return response()->json($range);
    }

    public function exportDataCctv3()
    {
        return Excel::download(new Cctv3Export, 'data-cctv-monitor3.xlsx');
    }
}
