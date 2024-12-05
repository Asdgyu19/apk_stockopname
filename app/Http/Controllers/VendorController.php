<?php

namespace App\Http\Controllers;

use App\Providers\DatabaseConnectionProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
    public function index()
    {

        $vendor = DB::select('SELECT * FROM vendor');


        return view('vendor.index', compact('vendor'));
    }

    public function save(Request $request)
    {
        DB::statement("USE pbd_uts");

        $nama_vendor = $request->input('nama_vendor');
        $badan_hukum = $request->input('badan_hukum');
        $status = $request->input('status');
        DB::insert('INSERT INTO vendor (nama_vendor, badan_hukum, status) VALUES (?, ?, ?)', [$nama_vendor, $badan_hukum, $status]);

        return redirect()->back()->with('success', 'Data inserted successfully!');
    }

    public function edit($id)
    {
        $vendor = DB::select('SELECT * FROM vendor WHERE idvendor = ?', [$id]);

        if (empty($vendor)) {
            return redirect()->back()->with('error', 'vendor not found.');
        }

        return view('vendor.edit', ['vendor' => $vendor[0]]);
    }

    public function update(Request $request, $id)
    {
        $nama_vendor = $request->input('nama_vendor');
        $badan_hukum = $request->input('badan_hukum');
        $status = $request->input('status');
        DB::update('UPDATE vendor SET nama_vendor = ?, badan_hukum = ?, status = ? WHERE idvendor = ?', [$nama_vendor,$badan_hukum, $status, $id]);

        return redirect('/vendor/index')->with('success', 'vendor updated successfully!');
    }

    public function delete($id)
    {
        DB::delete('DELETE FROM vendor WHERE idvendor = ?', [$id]);

        return redirect('/vendor/index')->with('success', 'vendor deleted successfully!');
    }
}
