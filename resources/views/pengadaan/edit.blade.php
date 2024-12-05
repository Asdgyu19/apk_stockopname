@extends('layout.main')
@section('page-title', 'Data')
@section('page-subTitle', 'Data Role')
@section('content')


@section('content')
<div class="container">
    <h1>Edit Pengadaan</h1>
    <form action="{{ route('pengadaan.update', $pengadaan->idpengadaan) }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="user_iduser">USER</label>
            <select name="user_iduser" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->iduser }}" {{ $pengadaan->user_iduser == $user->iduser ? 'selected' : '' }}>{{ $user->username }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="vendor_idvendor">VENDOR</label>
            <select name="vendor_idvendor" class="form-control" required>
                @foreach($vendors as $vendor)
                    <option value="{{ $vendor->idvendor }}" {{ $pengadaan->vendor_idvendor == $vendor->idvendor ? 'selected' : '' }}>{{ $vendor->nama_vendor }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="subtotal_nilai">Subtotal Nilai</label>
            <input type="number" name="subtotal_nilai" class="form-control" value="{{ $pengadaan->subtotal_nilai }}" required>
        </div>
        <div class="form-group">
            <label for="ppn">PPN (%)</label>
            <input type="number" name="ppn" class="form-control" value="{{ $pengadaan->ppn }}" required>
        </div>
        <div class="form-group">
            <label for="total_nilai">Total Nilai</label>
            <input type="number" name="total_nilai" class="form-control" value="{{ $pengadaan->total_nilai }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" class="form-control" value="{{ $pengadaan->status }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
