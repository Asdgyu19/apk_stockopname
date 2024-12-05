@extends('layout.main')
@section('page-title', 'Data')
@section('page-subTitle', 'Data Role')
@section('content')


@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengadaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Pengadaan</h2>
        <form action="{{ route('pengadaan.simpan') }}" method="POST">
            @csrf
            <!-- User -->
            <div class="mb-3">
                <label for="user" class="form-label">User</label>
                <select name="user_iduser" class="form-select" id="user" required>
                    <option value="" selected>Pilih User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->iduser }}">{{ $user->username }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Vendor -->
            <div class="mb-3">
                <label for="vendor" class="form-label">Vendor</label>
                <select name="vendor_idvendor" class="form-select" id="vendor" required>
                    <option value="" selected>Pilih Vendor</option>
                    @foreach($vendors as $vendor)
                        <option value="{{ $vendor->idvendor }}">{{ $vendor->nama_vendor }}</option>
                    @endforeach
                </select>
            </div>

            {{-- <!-- Harga Satuan -->
            <div class="mb-3">
                <label for="harga_satuan" class="form-label">Harga Satuan</label>
                <input type="number" name="harga_satuan" class="form-control" id="harga_satuan" placeholder="Harga Satuan" readonly>
            </div> --}}

            <!-- Jumlah Barang -->
            <div class="mb-3">
                <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                <input type="number" name="jumlah_barang" class="form-control" id="jumlah_barang" placeholder="Masukkan Jumlah Barang" required>
            </div>

            <!-- PPN -->
            <div class="mb-3">
                <label for="ppn" class="form-label">PPN (%)</label>
                <select name="ppn" class="form-select" id="ppn" required>
                    <option value="" selected>Pilih PPN</option>
                    @foreach($margins as $margin)
                        <option value="{{ $margin->persen }}">{{ $margin->persen }}%</option>
                    @endforeach
                </select>

            </div>

            <!-- Barang -->
            <div class="mb-3">
                <label for="barang" class="form-label">Barang</label>
                <select name="idbarang" class="form-select" id="barang" required>
                    <option value="" selected>Pilih Barang</option>
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->idbarang }}">{{ $barang->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="harga_satuan" class="form-label">Harga Satuan</label>
                <input type="text" name="harga_satuan" class="form-control" id="harga_satuan" placeholder="Harga Satuan" readonly>
            </div>

            <script>
                document.getElementById('barang').addEventListener('change', function () {
                    const selectedOption = this.options[this.selectedIndex];
                    const hargaSatuan = selectedOption.getAttribute('data-harga');
                    document.getElementById('harga_satuan').value = hargaSatuan ? hargaSatuan : '';
                });
            </script>

            <!-- Satuan -->
            <div class="mb-3">
                <label for="satuan" class="form-label">Satuan</label>
                <select name="satuan" class="form-select" id="satuan" required>
                    <option value="" selected>Pilih Satuan</option>
                    @foreach($satuans as $satuan)
                        <option value="{{ $satuan->idsatuan }}">{{ $satuan->nama_satuan }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<div class="container mt-5">
    <h3 class="mb-4">Daftar Pengadaan</h3>
    <table class="table table-bordered" id="pengadaanTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Vendor</th>
                <th>Subtotal Nilai</th>
                <th>PPN</th>
                <th>Total Nilai</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data dari backend bisa di-load di sini -->
            @foreach ($pengadaans as $pengadaan)
            <tr>
                <td>{{ $pengadaan->id }}</td>
                <td>{{ $pengadaan->user->username }}</td>
                <td>{{ $pengadaan->vendor->nama_vendor }}</td>
                <td>{{ $pengadaan->subtotal_nilai }}</td>
                <td>{{ $pengadaan->ppn }}</td>
                <td>{{ $pengadaan->subtotal_nilai + ($pengadaan->subtotal_nilai * $pengadaan->ppn / 100) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
