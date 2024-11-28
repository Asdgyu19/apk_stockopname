@extends('layout.main')
@section('page-title', 'Edit Role')
@section('page-subTitle', 'Edit Data Role')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Edit Data Role</h4>
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Role</h5>
                    </div>
                    <div class="card-body">
                        <form action="/role/update/{{ $role->idrole }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="inputRole">Nama Role</label>
                                <input type="text" class="form-control" name="nama_role" id="inputRole"
                                    value="{{ $role->nama_role }}" placeholder="role baru"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
