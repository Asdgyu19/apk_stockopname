@extends('layout.main')
@section('page-title', 'Data Margin Penjualan')
@section('page-subTitle', 'Data Margin Penjualan')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Margin Penjualan</h4>

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Masukkan Data Margin Penjualan</h5>
                    </div>
                    <div class="card-body">
                        <form action="/margin-penjualan/simpan" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="inputPersen">Persen Margin</label>
                                <input type="text" class="form-control" name="persen" id="inputPersen"
                                    placeholder="Masukkan Persen Margin" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="inputStatus">Status</label>
                                <input type="text" class="form-control" name="status" id="inputStatus"
                                    placeholder="Masukkan Status" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="inputUser">User</label>
                                <select name="iduser" class="form-select" id="inputUser">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->iduser }}">{{ $user->username }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card">
                <h5 class="card-header">Data Margin Penjualan</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr class="text-nowrap">
                                <th>ID</th>
                                <th>Persen</th>
                                <th>Status</th>
                                <th>User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($margin_penjualan as $item)
                                <tr>
                                    <td>{{ $item->idmargin_penjualan }}</td>
                                    <td>{{ $item->persen }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>
                                        <a href="/margin-penjualan/edit/{{ $item->idmargin_penjualan }}" class="btn btn-icon btn-outline-warning">
                                            <span class="tf-icons bx bx-edit-alt"></span>
                                        </a>
                                        <a href="/margin-penjualan/delete/{{ $item->idmargin_penjualan }}" class="btn btn-icon btn-outline-danger" onclick="return confirm('Are you sure?')">
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
