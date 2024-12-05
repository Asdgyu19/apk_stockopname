@extends('layout.main')
@section('page-title', 'Data')
@section('page-subTitle', 'Data Role')
@section('content')

<div class="container mt-5">
    <h1 class="text-center">Produk Tersedia</h1>
    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produk as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->stok ?? 0 }}</td>
                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                <td>
                    <a href="#" class="btn btn-primary btn-sm">Beli</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
