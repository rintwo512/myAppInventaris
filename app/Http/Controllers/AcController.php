<?php

namespace App\Http\Controllers;

use App\Models\Ac;

use App\Models\User;
use App\Exports\AcExport;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Http;


class AcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dataAc.index', [
            'title' => 'Data AC',
            'data' => Ac::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dataAC/create', [
            'title' => 'Tambah Data AC'
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



        $validateDataAc = $request->validate([
            'wing' => 'required',

            'lantai' => 'required',
            'ruangan' => 'required',
            'merk' => 'required',
            'type' => 'required',
            'jenis' => 'required',
            'ruangan' => 'required',
            'kapasitas' => 'required',
            'refrigerant' => 'required',
            'voltage' => 'required',
            'status' => 'required'
        ]);

        $rulesSeri = [
            'seri_indoor' => 'unique:ac,NULL',
            'seri_outdoor' => 'unique:ac,NULL'
        ];

        if ($request->seri_indoor != NULL) {

            $validateDataAc = $request->validate($rulesSeri);
        }

        $rulesLabel = [
            'label' => 'unique:ac',
        ];
        if ($request->label != NULL) {
            $validateDataAc = $request->validate($rulesLabel);
        }

        $validateDataAc =
            [
                'label' => $request->label,
                'assets' => $request->assets,
                'wing' => $request->wing,
                'lantai' => $request->lantai,
                'ruangan' => $request->ruangan,
                'merk' => $request->merk,
                'type' => $request->type,
                'jenis' => $request->jenis,
                'kapasitas' => $request->kapasitas,
                'refrigerant' => $request->refrigerant,
                'product' => $request->product,
                'current' => $request->current,
                'voltage' => $request->voltage,
                'btu' => $request->btu,
                'pipa' => $request->pipa,
                'status' => $request->status,
                'catatan' => $request->catatan,
                'kerusakan' => $request->kerusakan,
                'keterangan' => $request->keterangan,
                'tgl_pemasangan' => $request->tgl_pemasangan,
                'petugas_pemasangan' => $request->petugas_pemasangan,
                'tgl_maintenance' => $request->tgl_maintenance,
                'petugas_maint' => $request->petugas_maint,
                'seri_indoor' => $request->seri_indoor,
                'seri_outdoor' => $request->seri_outdoor,
                'user_id' => auth()->user()->id
            ];

        Ac::create($validateDataAc);
        return redirect('/ac')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ac  $ac
     * @return \Illuminate\Http\Response
     */
    public function show(Ac $ac, $id)
    {

        return view('dataAC.update', [
            'title' => 'Update Data AC',
            'ac' => Ac::find($id),
            'dataall' => Ac::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ac  $ac
     * @return \Illuminate\Http\Response
     */
    public function edit(Ac $ac)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ac  $ac
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ac $ac, $id)
    {
        $old = Ac::find($id);

        $rules = [
            'wing' => 'required',
            'lantai' => 'required',
            'ruangan' => 'required',
            'merk' => 'required',
            'type' => 'required',
            'jenis' => 'required',
            'kapasitas' => 'required',
            'refrigerant' => 'required',
            'voltage' => 'required',
            'status' => 'required'
        ];

        $validateNewData = $request->validate($rules);

        $ruleSeri = [
            'seri_indoor' => 'required|unique:ac',
            'seri_outdoor' => 'required|unique:ac'
        ];

        if ($request->seri_indoor != $old->seri_indoor) {
            $validateNewData = $request->validate($ruleSeri);
        }
        if ($request->seri_outdoor != $old->seri_outdoor) {
            $validateNewData = $request->validate($ruleSeri);
        }


        $validateNewData =
            [
                'label' => $request->label,
                'assets' => $request->assets,
                'wing' => $request->wing,
                'lantai' => $request->lantai,
                'ruangan' => $request->ruangan,
                'merk' => $request->merk,
                'type' => $request->type,
                'jenis' => $request->jenis,
                'kapasitas' => $request->kapasitas,
                'refrigerant' => $request->refrigerant,
                'product' => $request->product,
                'current' => $request->current,
                'voltage' => $request->voltage,
                'btu' => $request->btu,
                'pipa' => $request->pipa,
                'status' => $request->status,
                'catatan' => $request->catatan,
                'kerusakan' => $request->kerusakan,
                'keterangan' => $request->keterangan,
                'tgl_pemasangan' => $request->tgl_pemasangan,
                'petugas_pemasangan' => $request->petugas_pemasangan,
                'tgl_maintenance' => $request->tgl_maintenance,
                'petugas_maint' => $request->petugas_maint,
                'seri_indoor' => $request->seri_indoor,
                'seri_outdoor' => $request->seri_outdoor,
                'user_updated' => auth()->user()->name,
                'user_updated_time' => date('Y-m-d H:i:s')
            ];
        $newData = Ac::where('id', $id)
            ->update($validateNewData);

        if ($newData > 0) {
            $dateNow = Carbon::now();
            $getDataUpdate = Ac::where('user_updated_time', $dateNow)->first();
            $pesan = '*Tanggal Update* ' . '*' . $dateNow . '*' . "\n"
                . "*Data AC yang telah diupdate*\n\n" . "Di update oleh : " . $getDataUpdate->user_updated . "\nWing : " . $getDataUpdate->wing . "\nLantai : " . $getDataUpdate->lantai . "\nRuangan : " . $getDataUpdate->ruangan . "\nMerk : " . $getDataUpdate->merk . "\nType : " . $getDataUpdate->type . "\nStatus : " . $getDataUpdate->status . "\nDi maintenance : " . Carbon::parse($getDataUpdate->tgl_maintenance)->diffForHumans() . "\nCatatan : " . $getDataUpdate->catatan;
            $pesanEncode = urlencode($pesan);
            $response = Http::get('https://api.telegram.org/bot5372613320:AAHJNa6n0C68VZFWIDcRckIWSjP_UCLiGBU/sendMessage?parse_mode=markdown&chat_id=-532291265&text=' . $pesanEncode);
        }

        return redirect('/ac')->with('success', 'Data berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ac  $ac
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ac $ac, $id)
    {
        Ac::where('id', $id)->update(['is_delete' => auth()->user()->name]);
        Ac::destroy($id);
        return redirect('/ac');
    }

    public function trash()
    {
        return view('dataAC.sampah', [
            'title' => 'Trash',
            'softData' => Ac::onlyTrashed()->get()
        ]);
    }

    public function deleteAll()
    {
        Ac::onlyTrashed()->forceDelete();
        return redirect('/ac/trash');
    }

    public function exportDataAc()
    {
        return Excel::download(new AcExport, 'data-ac.xlsx');
    }

    public function deleteCheckedAc(Request $request)
    {
        $ids = $request->ids;
        Ac::whereIn('id', $ids)->update(['is_delete' => auth()->user()->name]);
        Ac::whereIn('id', $ids)->delete();
        return response()->json(['success' => 'Data have been delete!']);
    }

    public function restore($id)
    {

        $restoreDataId = Ac::withTrashed()->find($id);

        if ($restoreDataId && $restoreDataId->trashed()) {
            $restoreDataId->restore();
        }

        return response()->json(['success' => 'Data kembali']);
    }

    public function queryRangeAc($nilai)
    {
        $start = substr($nilai, 0, 10);
        $end = substr($nilai, 13, 24);

        $range = Ac::whereBetween('user_updated_time', [$start, $end])->get();
        return response()->json($range);
    }
}
