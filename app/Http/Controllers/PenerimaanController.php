<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenerimaanController extends Controller
{
    public function index()
    {
        // Fetch data penerimaan dengan relasi pengadaan
        $penerimaan = DB::table('penerimaan')
            ->join('pengadaan', 'penerimaan.idpengadaan', '=', 'pengadaan.idpengadaan')
            ->join('vendor', 'pengadaan.vendor_idvendor', '=', 'vendor.idvendor')
            ->join('user', 'pengadaan.user_iduser', '=', 'user.iduser')
            ->select(
                'penerimaan.idpenerimaan',
                'penerimaan.created_at AS tanggal_penerimaan',
                'pengadaan.timestamp AS tanggal_pengadaan',
                'user.username AS diajukan_oleh',
                'vendor.nama_vendor',
                'penerimaan.status'
            )
            ->get();

        return view('penerimaan.index', compact('penerimaan'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'idpengadaan' => 'required|exists:pengadaan,idpengadaan',
            'status' => 'required',
        ]);

        // Insert data ke tabel penerimaan
        DB::table('penerimaan')->insert([
            'idpengadaan' => $request->idpengadaan,
            'status' => $request->status,
            'created_at' => now(),
        ]);

        return redirect()->route('penerimaan.index')->with('success', 'Penerimaan berhasil disimpan.');
    }

    public function edit($id)
    {
        $penerimaan = DB::table('penerimaan')->where('idpenerimaan', $id)->first();
        if (!$penerimaan) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        return view('penerimaan.edit', compact('penerimaan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        DB::table('penerimaan')->where('idpenerimaan', $id)->update([
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        return redirect()->route('penerimaan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function delete($id)
    {
        DB::table('penerimaan')->where('idpenerimaan', $id)->delete();
        return redirect()->route('penerimaan.index')->with('success', 'Data berhasil dihapus.');
    }
}
