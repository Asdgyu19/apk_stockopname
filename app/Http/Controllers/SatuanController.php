<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SatuanController extends Controller
{
    public function index()
    {
        $satuan = DB::select('SELECT * FROM satuan');

        return view('satuan.index', ['satuan' => $satuan]);
    }

    public function save(Request $request)
    {
        DB::statement("USE pbd");

        $nama_satuan = $request->input('nama_satuan');
        $status = $request->input('status');
        DB::insert('INSERT INTO satuan (nama_satuan, status) VALUES (?, ?)', [$nama_satuan, $status]);

        return redirect()->back()->with('success', 'Data inserted successfully!');
    }

    public function edit($id)
    {
        $satuan = DB::select('SELECT * FROM satuan WHERE idsatuan = ?', [$id]);

        if (empty($satuan)) {
            return redirect()->back()->with('error', 'satuan not found.');
        }

        return view('satuan.edit', ['satuan' => $satuan[0]]);
    }

    public function update(Request $request, $id)
    {
        $nama_satuan = $request->input('nama_satuan');
        $status = $request->input('status');
        DB::update('UPDATE satuan SET nama_satuan = ?, status = ? WHERE idsatuan = ?', [$nama_satuan, $status, $id]);

        return redirect('/satuan/index')->with('success', 'satuan updated successfully!');
    }

    public function delete($id)
    {
        DB::delete('DELETE FROM satuan WHERE idsatuan = ?', [$id]);

        return redirect('/satuan/index')->with('success', 'satuan deleted successfully!');
    }
}

