@extends('layout.main')
@section('page-title', 'Edit Margin Penjualan')
@section('page-subTitle', 'Edit Data Margin Penjualan')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Edit Data Margin Penjualan</h4>

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Margin Penjualan</h5>
                    </div>
                    <div class="card-body">
                        <form action="/margin-penjualan/update/{{ $margin_penjualan->idmargin_penjualan }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="inputPersen">Persen Margin</label>
                                <input type="text" class="form-control" name="persen" id="inputPersen"
                                    value="{{ $margin_penjualan->persen }}" placeholder="Masukkan Persen Margin" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="inputStatus">Status</label>
                                <input type="text" class="form-control" name="status" id="inputStatus"
                                    value="{{ $margin_penjualan->status }}" placeholder="Masukkan Status" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="inputUser">User</label>
                                <select name="iduser" class="form-select" id="inputUser">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->iduser }}"
                                            {{ $margin_penjualan->iduser == $user->iduser ? 'selected' : '' }}>
                                            {{ $user->username }}
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
