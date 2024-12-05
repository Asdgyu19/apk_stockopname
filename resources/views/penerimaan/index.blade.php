@extends('layout.main')
@section('page-title', 'Data')
@section('page-subTitle', 'Data Role')
@section('content')

<div class="container">
    <h3>Data Penerimaan</h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Penerimaan</th>
                <th>Diajukan Oleh</th>
                <th>Vendor</th>
                <th>Status</th>
                <th>Tanggal Pengadaan</th>
                <th>Tanggal Penerimaan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penerimaan as $data)
                <tr>
                    <td>{{ $data->idpenerimaan }}</td>
                    <td>{{ $data->diajukan_oleh }}</td>
                    <td>{{ $data->nama_vendor }}</td>
                    <td>
                        <span class="badge {{ $data->status == 'DISETUJUI' ? 'bg-success' : ($data->status == 'MENUNGGU' ? 'bg-warning' : 'bg-danger') }}">
                            {{ $data->status }}
                        </span>
                    </td>
                    <td>{{ $data->tanggal_pengadaan }}</td>
                    <td>{{ $data->tanggal_penerimaan }}</td>
                    <td>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $data->idpenerimaan }}">Detail</button>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="detailModal{{ $data->idpenerimaan }}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detailModalLabel">Detail Penerimaan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Tanggal Pengadaan:</strong> {{ $data->tanggal_pengadaan }}</p>
                                <p><strong>Tanggal Penerimaan:</strong> {{ $data->tanggal_penerimaan }}</p>
                                <p><strong>Diajukan Oleh:</strong> {{ $data->diajukan_oleh }}</p>
                                <p><strong>Vendor:</strong> {{ $data->nama_vendor }}</p>
                                <p><strong>Status:</strong> {{ $data->status }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success">Setujui</button>
                                <button type="button" class="btn btn-danger">Tolak</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
