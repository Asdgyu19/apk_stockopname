<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReturController extends Controller
{
    // Menampilkan halaman index retur
    public function index()
    {
        // Mengambil data retur untuk ditampilkan di tabel
        $retur = DB::table('retur')
            ->join('user', 'retur.iduser', '=', 'user.iduser')
            ->join('penerimaan', 'retur.idpenerimaan', '=', 'penerimaan.idpenerimaan')
            ->select(
                'retur.idretur',
                'penerimaan.created_at as tanggal_penerimaan',
                'user.username',
                'retur.created_at as tanggal_retur'
            )
            ->orderBy('retur.created_at', 'desc')
            ->get();

        // Mengambil data untuk dropdown
        $penerimaan = DB::table('penerimaan')
            ->select('idpenerimaan', 'created_at')
            ->get();

        $users = DB::table('user')->select('iduser', 'username')->get();

        return view('retur.index', compact('retur', 'penerimaan', 'users'));
    }

    // Menyimpan data retur baru
    public function save(Request $request)
    {
        // Validasi input
        $request->validate([
            'idpenerimaan' => 'required|exists:penerimaan,idpenerimaan',
            'iduser' => 'required|exists:user,iduser',
        ]);

        // Simpan data retur
        DB::table('retur')->insert([
            'idpenerimaan' => $request->idpenerimaan,
            'iduser' => $request->iduser,
            'created_at' => now(),
        ]);

        return redirect()->route('retur/index')->with('success', 'Data retur berhasil ditambahkan');
    }

    // Menampilkan data retur untuk diedit
    public function edit($id)
    {
        $retur = DB::table('retur')->where('idretur', $id)->first();

        if (!$retur) {
            return redirect()->route('retur/index')->with('error', 'Data retur tidak ditemukan');
        }

        $penerimaan = DB::table('penerimaan')->select('idpenerimaan', 'created_at')->get();
        $users = DB::table('user')->select('iduser', 'username')->get();

        return view('retur.edit', compact('retur', 'penerimaan', 'users'));
    }

    // Mengupdate data retur
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'idpenerimaan' => 'required|exists:penerimaan,idpenerimaan',
            'iduser' => 'required|exists:user,iduser',
        ]);

        // Update data retur
        DB::table('retur')->where('idretur', $id)->update([
            'idpenerimaan' => $request->idpenerimaan,
            'iduser' => $request->iduser,
        ]);

        return redirect()->route('retur/index')->with('success', 'Data retur berhasil diperbarui');
    }

    // Menghapus data retur
    public function delete($id)
    {
        // Hapus data retur berdasarkan ID
        DB::table('retur')->where('idretur', $id)->delete();

        return redirect()->route('retur/index')->with('success', 'Data retur berhasil dihapus');
    }
}
