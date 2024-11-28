@extends('layout.main')
@section('page-title', 'Edit Pengadaan')
@section('page-subTitle', 'Edit Data Pengadaan')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center py-3 mb-4">
        <h4 class="fw-bold mb-0">Edit Data Pengadaan</h4>
        <a href="/pengadaan/index" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Form Edit Pengadaan</h5>
                </div>
                <div class="card-body">
                    <form action="/pengadaan/update/{{ $pengadaan->idpengadaan }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="inputTimestamp">Timestamp</label>
                            <input type="text" class="form-control" name="timestamp" id="inputTimestamp" value="{{ $pengadaan->timestamp }}" placeholder="Masukkan Timestamp" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputStatus">Status</label>
                            <input type="text" class="form-control" name="status" id="inputStatus" value="{{ $pengadaan->status }}" placeholder="Masukkan Status" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputUser">User</label>
                            <select name="user_iduser" class="form-select" id="inputUser">
                                @foreach ($users as $user)
                                    <option value="{{ $user->iduser }}" {{ $pengadaan->user_iduser == $user->iduser ? 'selected' : '' }}>
                                        {{ $user->username }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputVendor">Vendor</label>
                            <select name="vendor_idvendor" class="form-select" id="inputVendor">
                                @foreach ($vendors as $vendor)
                                    <option value="{{ $vendor->idvendor }}" {{ $pengadaan->vendor_idvendor == $vendor->idvendor ? 'selected' : '' }}>
                                        {{ $vendor->nama_vendor }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputSubtotal">Subtotal Nilai</label>
                            <input type="number" class="form-control" name="subtotal_nilai" id="inputSubtotal" value="{{ $pengadaan->subtotal_nilai }}" placeholder="Masukkan Subtotal Nilai" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputPPN">PPN</label>
                            <input type="number" class="form-control" name="ppn" id="inputPPN" value="{{ $pengadaan->ppn }}" placeholder="Masukkan PPN" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputTotal">Total Nilai</label>
                            <input type="number" class="form-control" name="total_nilai" id="inputTotal" value="{{ $pengadaan->total_nilai }}" placeholder="Masukkan Total Nilai" />
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
