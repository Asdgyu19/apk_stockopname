@extends('layout.main')
@section('page-title', 'Pengadaan')
@section('page-subTitle', 'Daftar Pengadaan')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center py-3 mb-4">
        <h4 class="fw-bold mb-0">Daftar Pengadaan</h4>
        <a href="/pengadaan/create" class="btn btn-primary">Tambah Pengadaan</a>
    </div>

    <div class="row">
        <div class="col-xl">
            <div class="card">
                <h5 class="card-header">Data Pengadaan</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Timestamp</th>
                                <th>Status</th>
                                <th>User</th>
                                <th>Vendor</th>
                                <th>Subtotal Nilai</th>
                                <th>PPN</th>
                                <th>Total Nilai</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengadaan as $item)
                                <tr>
                                    <td>{{ $item->idpengadaan }}</td>
                                    <td>{{ $item->timestamp }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->nama_vendor }}</td>
                                    <td>{{ $item->subtotal_nilai }}</td>
                                    <td>{{ $item->ppn }}</td>
                                    <td>{{ $item->total_nilai }}</td>
                                    <td>
                                        <a href="/pengadaan/edit/{{ $item->idpengadaan }}" class="btn btn-icon btn-outline-warning">
                                            <span class="tf-icons bx bx-edit-alt"></span>
                                        </a>
                                        <a href="/pengadaan/delete/{{ $item->idpengadaan }}" class="btn btn-icon btn-outline-danger" onclick="return confirm('Are you sure?')">
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
</div>

@endsection
