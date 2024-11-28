<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index()
    {
        $barang = DB::select('
            SELECT barang.*, satuan.nama_satuan
            FROM barang
            JOIN satuan ON barang.idsatuan = satuan.idsatuan
        ');
        $satuans = DB::select('SELECT * FROM satuan');

        return view('barang.index', ['barang' => $barang, 'satuans' => $satuans]);
    }

    public function save(Request $request)
    {

        DB::insert('
            INSERT INTO barang (jenis, nama, idsatuan, status, harga)
            VALUES (?, ?, ?, ?, ?)', [
            $request->input('jenis'),
            $request->input('nama'),
            $request->input('idsatuan'),
            $request->input('status'),
            $request->input('harga')
        ]);

        return redirect('/barang/index')->with('success', 'Barang berhasil dimasukkan');
    }

    public function edit($id)
    {

        $barang = DB::select('SELECT * FROM barang WHERE idbarang = ?', [$id]);

        if (empty($barang)) {
            return redirect()->back()->with('error', 'Barang not found.');
        }

        $satuan = DB::select('SELECT * FROM satuan');

        return view('barang.edit', ['barang' => $barang[0], 'satuan' => $satuan]);
    }

    public function update(Request $request, $id)
    {

        DB::update('
            UPDATE barang
            SET jenis = ?, nama = ?, idsatuan = ?, status = ?, harga = ?
            WHERE idbarang = ?', [
            $request->input('jenis'),
            $request->input('nama'),
            $request->input('idsatuan'),
            $request->input('status'),
            $request->input('harga'),
            $id
        ]);

        return redirect('/barang/index')->with('success', 'Barang updated successfully!');
    }

    public function delete($id)
    {
        DB::delete('DELETE FROM barang WHERE idbarang = ?', [$id]);

        return redirect('/barang/index')->with('success', 'Barang deleted successfully!');
    }
}
