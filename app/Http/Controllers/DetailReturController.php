<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DetailReturController extends Controller
{
    // Menampilkan daftar detail retur
    public function index()
    {
        $detailRetur = DB::table('detail_retur')->get();  // Mengambil data detail retur
        return view('detail_retur.index', compact('detailRetur'));
    }

    // Menyimpan detail retur
    public function save(Request $request)
    {
        DB::table('detail_retur')->insert([
            'id_retur' => $request->id_retur,
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'total' => $request->jumlah * $request->harga,
        ]);

        return redirect()->route('detail_retur/index');
    }

    // Mengedit detail retur
    public function edit($id)
    {
        $detailRetur = DB::table('detail_retur')->where('id', $id)->first();
        return view('detail_retur.edit', compact('detailRetur'));
    }

    // Memperbarui detail retur
    public function update(Request $request, $id)
    {
        DB::table('detail_retur')->where('id', $id)->update([
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'total' => $request->jumlah * $request->harga,
        ]);

        return redirect()->route('detail_retur/index');
    }

    // Menghapus detail retur
    public function delete($id)
    {
        DB::table('detail_retur')->where('id', $id)->delete();
        return redirect()->route('detail_retur/index');
    }
}
