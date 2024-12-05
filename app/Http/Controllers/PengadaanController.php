<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengadaanController extends Controller
{
    public function index()
    {

        $pengadaans = DB::select('
            SELECT p.idpengadaan, p.timestamp, u.username AS nama_user, p.status, v.nama_vendor,
                   p.subtotal_nilai, p.ppn, p.total_nilai
            FROM pengadaan p
            JOIN user u ON p.user_iduser = u.iduser
            JOIN vendor v ON p.vendor_idvendor = v.idvendor
        ');

        $users = DB::table('user')->select('iduser', 'username')->get();
        $vendors = DB::table('vendor')->select('idvendor', 'nama_vendor')->get();
        $margins = DB::table('margin_penjualan')->select('idmargin_penjualan', 'persen')->get();
        $barangs = DB::table('barang')->select('idbarang', 'nama')->get();
        $satuans = DB::table('satuan')->select('idsatuan', 'nama_satuan')->get();

        return view('pengadaan.index', compact('pengadaans', 'users', 'vendors', 'margins', 'barangs', 'satuans'));
    }

    public function simpan(Request $request)
    {

        $request->validate([
            'user_iduser' => 'required',
            'vendor_idvendor' => 'required',
            'subtotal_nilai' => 'required|numeric',
            'jumlah_barang' => 'required|numeric',
            'ppn' => 'required|numeric',
            'idbarang' => 'required',
            'satuan' => 'required',
            'status' => 'required',
        ]);

        // Menghitung total nilai berdasarkan subtotal dan PPN
        $total_nilai = $request->subtotal_nilai + ($request->subtotal_nilai * $request->ppn / 100);


        DB::insert('INSERT INTO pengadaan (user_iduser, vendor_idvendor, subtotal_nilai, ppn, total_nilai, status, timestamp)
                    VALUES (?, ?, ?, ?, ?, ?, NOW())',
                    [
                        $request->user_iduser,
                        $request->vendor_idvendor,
                        $request->subtotal_nilai,
                        $request->ppn,
                        $total_nilai, // Nilai total otomatis dihitung
                        $request->status,
                    ]);


        return redirect()->route('pengadaan.index')->with('success', 'Pengadaan berhasil ditambahkan.');
    }

    public function edit($id)
    {

        $pengadaan = DB::select('SELECT * FROM pengadaan WHERE idpengadaan = ?', [$id]);


        if (empty($pengadaan)) {
            return redirect()->back()->with('error', 'Pengadaan not found.');
        }


        $users = DB::select('SELECT * FROM user');
        $vendors = DB::select('SELECT * FROM vendor');


        return view('pengadaan.edit', compact('pengadaan', 'users', 'vendors'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'user_iduser' => 'required',
            'vendor_idvendor' => 'required',
            'subtotal_nilai' => 'required|numeric',
            'ppn' => 'required|numeric',
            'status' => 'required',
        ]);

        // Menghitung total nilai berdasarkan subtotal dan PPN
        $total_nilai = $request->subtotal_nilai + ($request->subtotal_nilai * $request->ppn / 100);

        // Updating the pengadaan data
        
        DB::update('UPDATE pengadaan SET user_iduser = ?, vendor_idvendor = ?, subtotal_nilai = ?, ppn = ?,
                    total_nilai = ?, status = ?, updated_at = NOW() WHERE idpengadaan = ?',
                    [
                        $request->user_iduser,
                        $request->vendor_idvendor,
                        $request->subtotal_nilai,
                        $request->ppn,
                        $total_nilai, // Nilai total otomatis dihitung
                        $request->status,
                        $id,
                    ]);

        // Redirect with success message
        return redirect()->route('pengadaan.index')->with('success', 'Pengadaan berhasil diupdate.');
    }

    public function delete($id)
    {
        // Deleting pengadaan based on ID
        DB::delete('DELETE FROM pengadaan WHERE idpengadaan = ?', [$id]);

        // Redirect with success message
        return redirect()->route('pengadaan.index')->with('success', 'Pengadaan berhasil dihapus.');
    }
}
