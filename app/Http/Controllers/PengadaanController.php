<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengadaanController extends Controller
{
    // Menampilkan data pengadaan menggunakan DB::table()
    public function index()
    {
        // Mengambil data pengadaan menggunakan DB::table() dengan raw SQL
        $pengadaan = DB::table('pengadaan')->get();  // Dengan cara ini, Anda bisa menghindari Eloquent/Model

        // Kirim data ke view
        return view('pengadaan.index', compact('pengadaan'));
    }
}
