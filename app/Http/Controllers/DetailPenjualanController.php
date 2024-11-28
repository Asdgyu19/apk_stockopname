<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DetailPenjualanController extends Controller
{
    // Menampilkan daftar detail penjualan
    public function index()
    {
        $detailPenjualan = DB::table('detail_penjualan')->get();
        return view('detail_penjualan.index', compact('detailPenjualan'));
    }

    // Menyimpan detail penjualan
    public function save(Request $request)
    {
        DB::table('detail_penjualan')->insert([
            'id_penjualan' => $request->id_penjualan,
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'total' => $request->jumlah * $request->harga,
        ]);

        return redirect()->route('detail_penjualan/index');
    }

    // Mengedit detail penjualan
    public function edit($id)
    {
        $detailPenjualan = DB::table('detail_penjualan')->where('id', $id)->first();
        return view('detail_penjualan.edit', compact('detailPenjualan'));
    }

    // Memperbarui detail penjualan
    public function update(Request $request, $id)
    {
        DB::table('detail_penjualan')->where('id', $id)->update([
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'total' => $request->jumlah * $request->harga,
        ]);

        return redirect()->route('detail_penjualan/index');
    }

    // Menghapus detail penjualan
    public function delete($id)
    {
        DB::table('detail_penjualan')->where('id', $id)->delete();
        return redirect()->route('detail_penjualan/index');
    }
}
