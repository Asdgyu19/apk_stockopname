<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KartuStokController extends Controller
{
    // Menampilkan kartu stok untuk barang tertentu
    public function index()
    {
        $kartuStok = DB::table('kartu_stok')->get();  // Ambil semua data kartu stok
        return view('kartu_stok.index', compact('kartuStok'));
    }
}
