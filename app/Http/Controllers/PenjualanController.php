<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index()
    {
        // Ambil data barang dan stok
        $produk = DB::table('barang')
            ->leftJoin('kartu_stok', 'barang.idbarang', '=', 'kartu_stok.idbarang')
            ->select(
                'barang.idbarang',
                'barang.nama',
                'barang.harga',
                DB::raw('SUM(kartu_stok.masuk - kartu_stok.keluar) as stok')
            )
            ->groupBy('barang.idbarang', 'barang.nama', 'barang.harga')
            ->get();

        return view('penjualan.index', compact('produk'));
    }
}
