@extends('layout.main')
@section('page-title', 'Data')
@section('page-subTitle', 'Data Role')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Role</h4>

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Masukkan Data Role</h5>
                    </div>
                    <div class="card-body">
                        <form action="/role/simpan" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="inputRole">Nama Role</label>
                                <input type="text" class="form-control" name="nama_role" id="inputRole"
                                    placeholder="Masukkan Role Baru"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card">
                <h5 class="card-header">Data Role</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr class="text-nowrap">
                                <th>id</th>
                                <th>Nama Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($role as $item)
                                <tr>
                                    <td>{{ $item->idrole }}</td>
                                    <td>{{ $item->nama_role }}</td>
                                    <td>
                                        <a href="/role/edit/{{ $item->idrole }}" class="btn btn-icon btn-outline-warning">
                                            <span class="tf-icons bx bx-edit-alt"></span>
                                        </a>
                                        <a href="/role/delete/{{ $item->idrole }}" class="btn btn-icon btn-outline-danger" onclick="return confirm('Yakin Dek?')">
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
