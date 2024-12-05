@extends('layout.main')
@section('page-title', 'Pengadaan')
@section('page-subTitle', 'Daftar Pengadaan')
@section('content')

<div class="container">
    <h1>Daftar Detail Pengadaan</h1>
    <a href="{{ route('detail_pengadaan.create') }}" class="btn btn-primary">Tambah Detail Pengadaan</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Harga Satuan</th>
            <th>Jumlah</th>
            <th>Sub Total</th>
            <th>ID Barang</th>
            <th>ID Pengadaan</th>
            <th>Aksi</th>
        </tr>
        @foreach ($detailPengadaans as $detailPengadaan)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $detailPengadaan->harga_satuan }}</td>
            <td>{{ $detailPengadaan->jumlah }}</td>
            <td>{{ $detailPengadaan->sub_total }}</td>
            <td>{{ $detailPengadaan->idbarang }}</td>
            <td>{{ $detailPengadaan->idpengadaan }}</td>
            <td>
                <a href="{{ route('detail_pengadaan.edit', $detailPengadaan->iddetail_pengadaan) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('detail_pengadaan.destroy', $detailPengadaan->iddetail_pengadaan) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
