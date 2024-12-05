<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  // Pastikan DB facade sudah di-import

class DetailPengadaanController extends Controller
{
    public function index()
    {
        $detailPengadaans = DB::table('detail_pengadaan')->get();
        return view('detail_pengadaan.index', compact('detailPengadaans'));
    }

    public function create()
    {
        return view('detail_pengadaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'harga_satuan' => 'required',
            'jumlah' => 'required',
            'sub_total' => 'required',
            'idbarang' => 'required',
            'idpengadaan' => 'required',
        ]);

        DB::table('detail_pengadaan')->insert([
            'harga_satuan' => $request->harga_satuan,
            'jumlah' => $request->jumlah,
            'sub_total' => $request->sub_total,
            'idbarang' => $request->idbarang,
            'idpengadaan' => $request->idpengadaan,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('detail_pengadaan.index')->with('success', 'Detail Pengadaan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $detailPengadaan = DB::table('detail_pengadaan')->where('iddetail_pengadaan', $id)->first();
        return view('detail_pengadaan.edit', compact('detailPengadaan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'harga_satuan' => 'required',
            'jumlah' => 'required',
            'sub_total' => 'required',
            'idbarang' => 'required',
            'idpengadaan' => 'required',
        ]);

        DB::table('detail_pengadaan')->where('iddetail_pengadaan', $id)->update([
            'harga_satuan' => $request->harga_satuan,
            'jumlah' => $request->jumlah,
            'sub_total' => $request->sub_total,
            'idbarang' => $request->idbarang,
            'idpengadaan' => $request->idpengadaan,
            'updated_at' => now()
        ]);

        return redirect()->route('detail_pengadaan.index')->with('success', 'Detail Pengadaan berhasil diupdate.');
    }

    public function destroy($id)
    {
        DB::table('detail_pengadaan')->where('iddetail_pengadaan', $id)->delete();
        return redirect()->route('detail_pengadaan.index')->with('success', 'Detail Pengadaan berhasil dihapus.');
    }
}
