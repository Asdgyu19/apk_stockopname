@extends('layout.main')
@section('page-title', 'Kartu Stok')
@section('content')

<div class="container">
    <h1>Kartu Stok</h1>
    <a href="{{ route('kartu_stok/tambah') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Jenis Transaksi</th>
                <th>Jumlah</th>
                <th>Stok Akhir</th>
                <th>Waktu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kartu_stok as $item)
                <tr>
                    <td>{{ $item->idkartu_stk }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>
                        {{ $item->jenis_transaksi == 'M' ? 'Masuk' : 'Keluar' }}
                    </td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ url('/kartu_stok/delete', $item->idkartu_stk) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
