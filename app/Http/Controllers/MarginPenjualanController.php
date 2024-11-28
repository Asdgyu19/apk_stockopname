<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarginPenjualanController extends Controller
{
    public function index()
    {
        $margin_penjualan = DB::select('SELECT margin_penjualan.*, user.username FROM margin_penjualan JOIN user ON margin_penjualan.iduser = user.iduser');
        $users = DB::select('SELECT * FROM user');

        return view('margin_penjualan.index', ['margin_penjualan' => $margin_penjualan, 'users' => $users]);
    }

    public function save(Request $request)
    {
        DB::insert('INSERT INTO margin_penjualan (created_at, persen, status, iduser, updated_at) VALUES (?, ?, ?, ?, ?)', [
            now(),
            $request->input('persen'),
            $request->input('status'),
            $request->input('iduser'),
            now()
        ]);

        return redirect('/margin-penjualan/index')->with('success', 'Margin penjualan berhasil disimpan!');
    }

    public function edit($id)
    {
        $margin_penjualan = DB::select('SELECT * FROM margin_penjualan WHERE idmargin_penjualan = ?', [$id]);

        if (empty($margin_penjualan)) {
            return redirect()->back()->with('error', 'Margin penjualan tidak ditemukan.');
        }

        $users = DB::select('SELECT * FROM user');

        return view('margin_penjualan.edit', ['margin_penjualan' => $margin_penjualan[0], 'users' => $users]);
    }

    public function update(Request $request, $id)
    {
        DB::update('UPDATE margin_penjualan SET persen = ?, status = ?, iduser = ?, updated_at = ?
                    WHERE idmargin_penjualan = ?', [
            $request->input('persen'),
            $request->input('status'),
            $request->input('iduser'),
            now(),
            $id
        ]);

        return redirect('/margin-penjualan/index')->with('success', 'Margin penjualan berhasil diupdate!');
    }

    public function delete($id)
    {
        DB::delete('DELETE FROM margin_penjualan WHERE idmargin_penjualan = ?', [$id]);

        return redirect('/margin-penjualan/index')->with('success', 'Margin penjualan berhasil dihapus!');
    }

}
