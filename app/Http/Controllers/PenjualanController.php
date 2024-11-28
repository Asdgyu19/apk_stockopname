<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    // Menampilkan daftar penjualan
    public function index()
    {
        $penjualan = DB::table('penjualan')->get();  // Mengambil semua data penjualan
        return view('penjualan.index', compact('penjualan'));  // Mengirim data ke view
    }

    // Menyimpan data penjualan
    public function save(Request $request)
    {
        DB::table('penjualan')->insert([
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'tanggal' => now(),
        ]);

        return redirect()->route('penjualan/index');
    }

    // Menampilkan form untuk mengedit penjualan
    public function edit($id)
    {
        $penjualan = DB::table('penjualan')->where('id', $id)->first();  // Mengambil data penjualan berdasarkan ID
        return view('penjualan.edit', compact('penjualan'));  // Menampilkan form edit dengan data penjualan
    }

    // Memperbarui data penjualan
    public function update(Request $request, $id)
    {
        DB::table('penjualan')->where('id', $id)->update([
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
        ]);

        return redirect()->route('penjualan/index');
    }

    // Menghapus data penjualan
    public function delete($id)
    {
        DB::table('penjualan')->where('id', $id)->delete();
        return redirect()->route('penjualan/index');
    }
}
