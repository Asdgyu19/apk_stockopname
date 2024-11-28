@extends('layout.main')
@section('page-title', 'Edit Data')
@section('page-subTitle', 'Edit Data Satuan')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Edit Satuan</h4>

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Data Satuan</h5>
                    </div>
                    <div class="card-body">
                        <form action="/satuan/update/{{ $satuan->idsatuan }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label" for="inputNamaSatuan">Nama Satuan</label>
                                <input type="text" class="form-control" name="nama_satuan" id="inputNamaSatuan"
                                    value="{{ $satuan->nama_satuan }}" placeholder="Masukkan Satuan Baru" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="inputStatus">Status</label>
                                <input type="text" class="form-control" name="status" id="inputStatus"
                                    value="{{ $satuan->status }}" placeholder="Masukkan Status Baru" />
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
