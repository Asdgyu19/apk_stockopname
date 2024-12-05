@extends('layout.main')
@section('page-title', 'Data')
@section('page-subTitle', 'Data Role')
@section('content')


<div class="container mt-5">
    <h2 class="mb-4">Retur Barang</h2>

    {{-- Form Tambah Retur --}}
    <div class="card mb-4">
        <div class="card-header">Tambah Retur</div>
        <div class="card-body">
            <form action="{{ url('/retur/simpan') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="idpenerimaan" class="form-label">Penerimaan</label>
                    <select class="form-select" id="idpenerimaan" name="idpenerimaan" required>
                        <option value="">Pilih Penerimaan</option>
                        @foreach ($penerimaan as $item)
                            <option value="{{ $item->idpenerimaan }}">{{ $item->created_at }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="iduser" class="form-label">User</label>
                    <select class="form-select" id="iduser" name="iduser" required>
                        <option value="">Pilih User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->iduser }}">{{ $user->username }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    {{-- Tabel Data Retur --}}
    <div class="card">
        <div class="card-header">Data Retur</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Penerimaan</th>
                        <th>User</th>
                        <th>Tanggal Retur</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($retur as $item)
                        <tr>
                            <td>{{ $item->idretur }}</td>
                            <td>{{ $item->tanggal_penerimaan }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->tanggal_retur }}</td>
                            <td>
                                <a href="{{ url('/retur/edit/' . $item->idretur) }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ url('/retur/delete/' . $item->idretur) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
