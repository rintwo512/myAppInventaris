<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{

    public function index()
    {
        return view('stock.index', [
            "title" => "Data Stock Barang",
            "dataStock" => Stock::all()
        ]);
    }


    public function store(Request $request)
    {
        $validateNewData = $request->validate([
            'nama' => 'required'
        ]);

        $validateNewData = [
            'nama' => $request->nama,
            'merk' => $request->merk,
            'jumlah' => $request->jumlah,
            'spesifikasi' => $request->spek,
            'tgl_pembelian' => $request->tgl_pembelian,
            'keterangan' => $request->keterangan,
            'catatan' => $request->catatan
        ];

        Stock::create($validateNewData);
        return back()->with('success', 'Data berhasil ditambah!');
    }

    // INI ADALAH METHOD UNTUK HAPUS DATA
    public function show($id)
    {
        Stock::destroy($id);
        return back()->with('success', 'Data berhasil di hapus!');
    }

    public function update(Request $request, $id)
    {
        $rules = ['nama' => 'required'];

        $newData = $request->validate($rules);
        $newData = [
            "nama" => Request()->nama,
            "merk" => $request->merk,
            "jumlah" => Request()->jumlah,
            "spesifikasi" => $request->spesifikasi,
            "tgl_pembelian" => $request->tgl_pembelian,
            "keterangan" => $request->keterangan,
            "catatan" => $request->catatan
        ];

        Stock::where('id', $id)->update($newData);
        return back()->with("success", "Data berhasil diupdate!");
    }
}
