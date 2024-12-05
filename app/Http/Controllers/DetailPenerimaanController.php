<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailPenerimaanController extends Controller
{
    // Method untuk menampilkan halaman index
    public function index()
    {
        return view('detail_penerimaan.index');
    }

}
