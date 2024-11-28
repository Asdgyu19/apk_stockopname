@extends('layout.main')

@section('page-title', 'Edit Barang')
@section('page-subTitle', 'Edit Data Barang')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center py-3 mb-4">
        <h4 class="fw-bold mb-0">Edit Data Barang</h4>
        <a href="/barang/index" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Form Edit Barang</h5>
                </div>
                <div class="card-body">
                    <form action="/barang/update/{{ $barang->idbarang }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="inputJenis">Jenis Barang</label>
                            <input type="text" class="form-control" name="jenis" id="inputJenis" value="{{ $barang->jenis }}" placeholder="Masukkan Jenis Barang" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputNama">Nama Barang</label>
                            <input type="text" class="form-control" name="nama" id="inputNama" value="{{ $barang->nama }}" placeholder="Masukkan Nama Barang" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputSatuan">Satuan</label>
                            <select name="idsatuan" class="form-select" id="inputSatuan">
                                @foreach ($satuan as $sat)
                                    <option value="{{ $sat->idsatuan }}" {{ $barang->idsatuan == $sat->idsatuan ? 'selected' : '' }}>
                                        {{ $sat->nama_satuan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputStatus">Status</label>
                            <input type="text" class="form-control" name="status" id="inputStatus" value="{{ $barang->status }}" placeholder="Masukkan Status" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputHarga">Harga</label>
                            <input type="number" class="form-control" name="harga" id="inputHarga" value="{{ $barang->harga }}" placeholder="Masukkan Harga" />
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
