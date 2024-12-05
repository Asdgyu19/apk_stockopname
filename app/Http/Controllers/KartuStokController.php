<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KartuStokController extends Controller
{
    // Menampilkan halaman kartu stok
    public function index()
    {
        // Mengambil data kartu stok dengan informasi barang
        $kartu_stok = DB::table('kartu_stok')
            ->join('barang', 'kartu_stok.idbarang', '=', 'barang.idbarang')
            ->select(
                'kartu_stok.*',
                'barang.nama as nama_barang',
                'barang.harga as harga_barang'
            )
            ->orderBy('kartu_stok.created_at', 'desc') // Mengurutkan data berdasarkan waktu terbaru
            ->get();

        return view('kartu_stok.index', compact('kartu_stok'));
    }

    // Menyimpan transaksi stok
    public function save(Request $request)
    {
        $request->validate([
            'jenis_transaksi' => 'required|in:M,K', // M = Masuk, K = Keluar
            'jumlah' => 'required|integer|min:1',
            'idbarang' => 'required|exists:barang,idbarang',
        ]);

        // Ambil stok saat ini
        $barang = DB::table('barang')->where('idbarang', $request->idbarang)->first();

        // Hitung stok akhir berdasarkan jenis transaksi
        $stok_akhir = $request->jenis_transaksi === 'M'
            ? $barang->stock + $request->jumlah
            : $barang->stock - $request->jumlah;

        if ($stok_akhir < 0) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi untuk transaksi keluar!');
        }

        // Simpan transaksi ke kartu_stok
        DB::table('kartu_stok')->insert([
            'jenis_transaksi' => $request->jenis_transaksi,
            'jumlah' => $request->jumlah,
            'stock' => $stok_akhir,
            'idbarang' => $request->idbarang,
            'created_at' => now(),
        ]);

        // Perbarui stok di tabel barang
        DB::table('barang')->where('idbarang', $request->idbarang)->update([
            'stock' => $stok_akhir,
        ]);

        return redirect()->route('kartu_stok/index')->with('success', 'Transaksi berhasil disimpan.');
    }

    // Menghapus transaksi stok
    public function delete($id)
    {
        $kartu_stok = DB::table('kartu_stok')->where('idkartu_stk', $id)->first();

        if (!$kartu_stok) {
            return redirect()->route('kartu_stok/index')->with('error', 'Transaksi tidak ditemukan.');
        }

        // Ambil data barang terkait
        $barang = DB::table('barang')->where('idbarang', $kartu_stok->idbarang)->first();

        // Kembalikan stok barang ke kondisi sebelumnya
        $stok_akhir = $kartu_stok->jenis_transaksi === 'M'
            ? $barang->stock - $kartu_stok->jumlah
            : $barang->stock + $kartu_stok->jumlah;

        // Hapus transaksi stok
        DB::table('kartu_stok')->where('idkartu_stk', $id)->delete();

        // Perbarui stok barang
        DB::table('barang')->where('idbarang', $kartu_stok->idbarang)->update([
            'stock' => $stok_akhir,
        ]);

        return redirect()->route('kartu_stok/index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
