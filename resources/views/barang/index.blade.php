@extends('layout.main')

@section('page-title', 'Tambah Data Barang')
@section('page-subTitle', 'Tambah Barang Baru')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center py-3 mb-4">
        <h4 class="fw-bold mb-0">Tambah Data Barang</h4>
        <a href="/barang/index" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Form Tambah Barang</h5>
                </div>
                <div class="card-body">
                    <form action="/barang/simpan" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="inputJenis">Jenis Barang</label>
                            <input type="text" class="form-control" name="jenis" id="inputJenis" placeholder="Masukkan Jenis Barang" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputNama">Nama Barang</label>
                            <input type="text" class="form-control" name="nama" id="inputNama" placeholder="Masukkan Nama Barang" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputSatuan">Satuan</label>
                            <select name="idsatuan" class="form-select" id="inputSatuan">
                                @foreach ($satuans as $satuan)
                                    <option value="{{ $satuan->idsatuan }}">{{ $satuan->nama_satuan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputStatus">Status</label>
                            <input type="text" class="form-control" name="status" id="inputStatus" placeholder="Masukkan Status" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputHarga">Harga</label>
                            <input type="number" class="form-control" name="harga" id="inputHarga" placeholder="Masukkan Harga" />
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card">
            <h5 class="card-header">Data Barang</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Jenis</th>
                            <th>Nama</th>
                            <th>Satuan</th>
                            <th>Status</th>
                            <th>Harga</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $item)
                            <tr>
                                <td>{{ $item->idbarang }}</td>
                                <td>{{ $item->jenis }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nama_satuan }}</td>
                                <td>{{ $item->status }}</td>
                                {{-- <td class="align-middle text-center">
                                    <span class="badge badge-sm {{ $item->status == 1 ? 'bg-gradient-success' : 'bg-gradient-secondary' }}">
                                        {{ $item->status == 1 ? 'Tersedia' : 'Habis' }}
                                    </span>
                                    <br>
                                    <form action="/barang/update-status/{{ $item->idbarang }}" method="post" style="display:inline-block;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm {{ $item->status == 1 ? 'btn-danger' : 'btn-success' }}">
                                            {{ $item->status == 1 ? 'Ubah ke Tidak Tersedia' : 'Ubah ke Tersedia' }}
                                        </button>
                                    </form>
                                </td> --}}
                                <td>{{ $item->harga }}</td>
                                <td>
                                    <a href="/barang/edit/{{ $item->idbarang }}" class="btn btn-icon btn-outline-warning">
                                        <span class="tf-icons bx bx-edit-alt"></span>
                                    </a>
                                    <a href="/barang/delete/{{ $item->idbarang }}" class="btn btn-icon btn-outline-danger" onclick="return confirm('Anda yakin?')">
                                        <span class="tf-icons bx bx-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
