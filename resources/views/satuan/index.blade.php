@extends('layout.main')
@section('page-title', 'Data')
@section('page-subTitle', 'Data Satuan')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Satuan</h4>

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Masukkan Data Satuan</h5>
                    </div>
                    <div class="card-body">
                        <form action="/satuan/simpan" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="inputNamaSatuan">Nama Satuan</label>
                                <input type="text" class="form-control" name="nama_satuan" id="inputNamaSatuan"
                                    placeholder="Masukkan Nama Satuan"/>
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
                <h5 class="card-header">Data Satuan</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr class="text-nowrap">
                                <th>id</th>
                                <th>Nama Satuan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($satuan as $item)
                                <tr>
                                    <td>{{ $item->idsatuan }}</td>
                                    <td>{{ $item->nama_satuan }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <a href="/satuan/edit/{{ $item->idsatuan }}" class="btn btn-icon btn-outline-warning">
                                            <span class="tf-icons bx bx-edit-alt"></span>
                                        </a>
                                        <a href="/satuan/delete/{{ $item->idsatuan }}" class="btn btn-icon btn-outline-danger" onclick="return confirm('Are you sure?')">
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
