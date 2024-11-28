<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  // Pastikan DB facade sudah di-import

class DetailPengadaanController extends Controller
{
    // Menampilkan daftar detail pengadaan
    public function index()
    {
        // Mengambil semua data dari tabel detail_pengadaan menggunakan raw SQL
        $detailPengadaan = DB::select('SELECT * FROM detail_pengadaan');

        // Mengirim data ke view
        return view('detail_pengadaan.index', compact('detailPengadaan'));
    }

    // Menambahkan detail pengadaan baru
    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'id_pengadaan' => 'required|integer',
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
            'subtotal' => 'required|numeric',
        ]);

        // Menyimpan data ke tabel detail_pengadaan menggunakan raw SQL
        DB::insert('INSERT INTO detail_pengadaan (id_pengadaan, nama_barang, jumlah, harga, subtotal)
                    VALUES (?, ?, ?, ?, ?)', [
                        $request->id_pengadaan,
                        $request->nama_barang,
                        $request->jumlah,
                        $request->harga,
                        $request->subtotal
                    ]);

        // Redirect ke halaman index setelah data berhasil disimpan
        return redirect()->route('detail_pengadaan.index')->with('success', 'Detail pengadaan berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit detail pengadaan
    public function edit($id)
    {
        // Mengambil data detail pengadaan berdasarkan ID menggunakan raw SQL
        $detailPengadaan = DB::select('SELECT * FROM detail_pengadaan WHERE id = ?', [$id]);

        // Jika data tidak ditemukan, redirect ke index dengan pesan error
        if (empty($detailPengadaan)) {
            return redirect()->route('detail_pengadaan.index')->with('error', 'Detail pengadaan tidak ditemukan.');
        }

        // Mengirim data detail pengadaan ke view
        return view('detail_pengadaan.edit', compact('detailPengadaan'));
    }

    // Memperbarui data detail pengadaan
    public function update(Request $request, $id)
    {
        // Validasi input data
        $request->validate([
            'id_pengadaan' => 'required|integer',
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
            'subtotal' => 'required|numeric',
        ]);

        // Memperbarui data detail pengadaan berdasarkan ID menggunakan raw SQL
        DB::update('UPDATE detail_pengadaan SET id_pengadaan = ?, nama_barang = ?, jumlah = ?, harga = ?, subtotal = ? WHERE id = ?', [
            $request->id_pengadaan,
            $request->nama_barang,
            $request->jumlah,
            $request->harga,
            $request->subtotal,
            $id
        ]);

        // Redirect ke halaman index setelah data berhasil diperbarui
        return redirect()->route('detail_pengadaan.index')->with('success', 'Detail pengadaan berhasil diperbarui!');
    }

    // Menghapus data detail pengadaan
    public function destroy($id)
    {
        // Menghapus data detail pengadaan berdasarkan ID menggunakan raw SQL
        DB::delete('DELETE FROM detail_pengadaan WHERE id = ?', [$id]);

        // Redirect ke halaman index setelah data berhasil dihapus
        return redirect()->route('detail_pengadaan.index')->with('success', 'Detail pengadaan berhasil dihapus!');
    }
}
