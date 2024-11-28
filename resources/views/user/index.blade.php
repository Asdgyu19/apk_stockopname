@extends('layout.main')
@section('page-title', 'Data')
@section('page-subTitle', 'Data User')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">User</h4>

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Masukkan Data User</h5>
                    </div>
                    <div class="card-body">
                        <form action="/user/simpan" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="inputUsername">Username</label>
                                <input type="text" class="form-control" name="username" id="inputUsername"
                                    placeholder="Masukkan Username"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="inputPassword">Password</label>
                                <input type="password" class="form-control" name="password" id="inputPassword"
                                    placeholder="Masukkan Password"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="inputRole">Role</label>
                                <select name="idrole" class="form-select color-dropdown" id="inputRole">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->idrole }}">{{ $role->nama_role }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card">
                <h5 class="card-header">Data User</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr class="text-nowrap">
                                <th>id</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $item->iduser }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->nama_role }}</td>
                                    <td>
                                        <a href="/user/edit/{{ $item->iduser }}" class="btn btn-icon btn-outline-warning">
                                            <span class="tf-icons bx bx-edit-alt"></span>
                                        </a>
                                        <a href="/user/delete/{{ $item->iduser }}" class="btn btn-icon btn-outline-danger" onclick="return confirm('Are you sure?')">
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
