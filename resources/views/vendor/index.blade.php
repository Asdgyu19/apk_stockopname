@extends('layout.main')
@section('page-title', 'Data')
@section('page-subTitle', 'Data Vendor')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Vendor</h4>

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Masukkan Data Vendor</h5>
                    </div>
                    <div class="card-body">
                        <form action="/vendor/simpan" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="inputVendor">Nama Vendor</label>
                                <input type="text" class="form-control" name="nama_vendor" id="inputVendor"
                                    placeholder="Masukkan Nama Vendor"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="inputBadanHukum">Badan Hukum</label>
                                <input type="text" class="form-control" name="badan_hukum" id="inputBadanHukum"
                                    placeholder="Masukkan Badan Hukum"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="inputStatus">status</label>
                                <input type="text" class="form-control" name="status" id="inputStatus"
                                    placeholder="Masukkan Status"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card">
                <h5 class="card-header">Data Vendor</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr class="text-nowrap">
                                <th>id</th>
                                <th>Nama Vendor</th>
                                <th>Badan Hukum</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendor as $item)
                                <tr>
                                    <td>{{ $item->idvendor }}</td>
                                    <td>{{ $item->nama_vendor }}</td>
                                    <td>{{ $item->badan_hukum }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <a href="/vendor/edit/{{ $item->idvendor }}" class="btn btn-icon btn-outline-warning">
                                            <span class="tf-icons bx bx-edit-alt"></span>
                                        </a>
                                        <a href="/vendor/delete/{{ $item->idvendor }}" class="btn btn-icon btn-outline-danger" onclick="return confirm('Are you sure?')">
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
