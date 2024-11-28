@extends('layout.main')
@section('page-title', 'Edit Data')
@section('page-subTitle', 'Edit Data User')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Edit User</h4>

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Data User</h5>
                    </div>
                    <div class="card-body">
                        <form action="/user/update/{{ $user->iduser }}" method="post">
                            @csrf


                            <div class="mb-3">
                                <label class="form-label" for="inputUsername">Username</label>
                                <input type="text" class="form-control" name="username" id="inputUsername"
                                    value="{{ $user->username }}" placeholder="Masukkan Username Baru"/>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="inputPassword">Password (Biarkan kosong jika tidak ingin mengganti)</label>
                                <input type="password" class="form-control" name="password" id="inputPassword"
                                    placeholder="Masukkan Password Baru"/>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="inputRole">Role</label>
                                <select name="idrole" class="form-select color-dropdown" id="inputRole">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->idrole }}"
                                            {{ $role->idrole == $user->idrole ? 'selected' : '' }}>
                                            {{ $role->nama_role }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
