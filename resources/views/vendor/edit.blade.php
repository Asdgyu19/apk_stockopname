@extends('layout.main')
@section('page-title', 'Edit Data')
@section('page-subTitle', 'Edit Data Vendor')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Edit Vendor</h4>

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Data Vendor</h5>
                    </div>
                    <div class="card-body">
                        <form action="/vendor/update/{{ $vendor->idvendor }}" method="post">
                            @csrf
                            {{-- @method('PUT') --}}

                            <div class="mb-3">
                                <label class="form-label" for="inputNamaVendor">Nama Vendor</label>
                                <input type="text" class="form-control" name="nama_vendor" id="inputNamaVendor"
                                    value="{{ $vendor->nama_vendor }}" placeholder="Masukkan Vendor Baru" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="inputBadanHukum">badan hukum</label>
                                <input type="text" class="form-control" name="badan_hukum" id="inputBadanHukum"
                                    value="{{ $vendor->badan_hukum }}" placeholder="Masukkan Badan Hukum Baru" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="inputStatus">Status</label>
                                <input type="text" class="form-control" name="status" id="inputStatus"
                                    value="{{ $vendor->status }}" placeholder="Masukkan Status Baru" />
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
