<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatabaseController extends Controller
{
    public function create_database()
    {

    }

    public function create_table()
    {
        DB::statement("USE pbd_uts");

        // Tabel role
        $role = "CREATE TABLE IF NOT EXISTS role (
            idrole INT AUTO_INCREMENT PRIMARY KEY,
            nama_role VARCHAR(100)
        )";
        DB::statement($role);

        // Tabel satuan
        $satuan = "CREATE TABLE IF NOT EXISTS satuan (
            idsatuan INT AUTO_INCREMENT PRIMARY KEY,
            nama_satuan VARCHAR(45),
            status TINYINT
        )";
        DB::statement($satuan);

        // Tabel vendor
        $vendor = "CREATE TABLE IF NOT EXISTS vendor (
            idvendor INT AUTO_INCREMENT PRIMARY KEY,
            nama_vendor VARCHAR(100),
            badan_hukum CHAR(1),
            status CHAR(1)
        )";
        DB::statement($vendor);

        // Tabel user
        $user = "CREATE TABLE IF NOT EXISTS user (
            iduser INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(45),
            password VARCHAR(100),
            idrole INT,
            FOREIGN KEY (idrole) REFERENCES role(idrole)
        )";
        DB::statement($user);

        // Tabel barang
        $barang = "CREATE TABLE IF NOT EXISTS barang (
            idbarang INT AUTO_INCREMENT PRIMARY KEY,
            jenis CHAR(1),
            nama VARCHAR(45),
            idsatuan INT,
            status TINYINT,
            harga INT,
            FOREIGN KEY (idsatuan) REFERENCES satuan(idsatuan)
        )";
        DB::statement($barang);

        // Tabel margin penjualan
        $margin_penjualan = "CREATE TABLE IF NOT EXISTS margin_penjualan (
            idmargin_penjualan INT AUTO_INCREMENT PRIMARY KEY,
            created_at TIMESTAMP,
            persen DOUBLE,
            status TINYINT,
            iduser INT,
            updated_at TIMESTAMP,
            FOREIGN KEY (iduser) REFERENCES user(iduser)
        )";
        DB::statement($margin_penjualan);

        // Tabel pengadaan
        $pengadaan = "CREATE TABLE IF NOT EXISTS pengadaan (
            idpengadaan BIGINT AUTO_INCREMENT PRIMARY KEY,
            timestamp TIMESTAMP,
            user_iduser INT,
            status CHAR(1),
            vendor_idvendor INT,
            subtotal_nilai INT,
            ppn INT,
            total_nilai INT,
            FOREIGN KEY (user_iduser) REFERENCES user(iduser),
            FOREIGN KEY (vendor_idvendor) REFERENCES vendor(idvendor)
        )";
        DB::statement($pengadaan);

        // Tabel detail pengadaan
        $detail_pengadaan = "CREATE TABLE IF NOT EXISTS detail_pengadaan (
            iddetail_pengadaan BIGINT AUTO_INCREMENT PRIMARY KEY,
            harga_satuan INT,
            jumlah INT,
            sub_total INT,
            idbarang INT,
            idpengadaan BIGINT,
            FOREIGN KEY (idbarang) REFERENCES barang(idbarang),
            FOREIGN KEY (idpengadaan) REFERENCES pengadaan(idpengadaan)
        )";
        DB::statement($detail_pengadaan);

        // Tabel penjualan
        $penjualan = "CREATE TABLE IF NOT EXISTS penjualan (
            idpenjualan INT AUTO_INCREMENT PRIMARY KEY,
            created_at TIMESTAMP,
            subtotal_nilai INT,
            ppn INT,
            total_nilai INT,
            iduser INT,
            idmargin_penjualan INT,
            FOREIGN KEY (iduser) REFERENCES user(iduser),
            FOREIGN KEY (idmargin_penjualan) REFERENCES margin_penjualan(idmargin_penjualan)
        )";
        DB::statement($penjualan);

        // Tabel detail penjualan
        $detail_penjualan = "CREATE TABLE IF NOT EXISTS detail_penjualan (
            iddetail_penjualan BIGINT AUTO_INCREMENT PRIMARY KEY,
            harga_satuan INT,
            jumlah INT,
            subtotal INT,
            penjualan_idpenjualan INT,
            idbarang INT,
            FOREIGN KEY (penjualan_idpenjualan) REFERENCES penjualan(idpenjualan),
            FOREIGN KEY (idbarang) REFERENCES barang(idbarang)
        )";
        DB::statement($detail_penjualan);

        // Tabel penerimaan
        $penerimaan = "CREATE TABLE IF NOT EXISTS penerimaan (
            idpenerimaan BIGINT AUTO_INCREMENT PRIMARY KEY,
            created_at TIMESTAMP,
            status CHAR(1),
            idpengadaan BIGINT,
            iduser INT,
            FOREIGN KEY (idpengadaan) REFERENCES pengadaan(idpengadaan),
            FOREIGN KEY (iduser) REFERENCES user(iduser)
        )";
        DB::statement($penerimaan);

        // Tabel detail penerimaan
        $detail_penerimaan = "CREATE TABLE IF NOT EXISTS detail_penerimaan (
            iddetail_penerimaan BIGINT AUTO_INCREMENT PRIMARY KEY,
            idpenerimaan BIGINT,
            barang_idbarang INT,
            jumlah_terima INT,
            harga_satuan_terima INT,
            sub_total_terima INT,
            FOREIGN KEY (idpenerimaan) REFERENCES penerimaan(idpenerimaan),
            FOREIGN KEY (barang_idbarang) REFERENCES barang(idbarang)
        )";
        DB::statement($detail_penerimaan);

        // Tabel retur
        $retur = "CREATE TABLE IF NOT EXISTS retur (
            idretur BIGINT AUTO_INCREMENT PRIMARY KEY,
            created_at TIMESTAMP,
            idpenerimaan BIGINT,
            iduser INT,
            FOREIGN KEY (idpenerimaan) REFERENCES penerimaan(idpenerimaan),
            FOREIGN KEY (iduser) REFERENCES user(iduser)
        )";
        DB::statement($retur);

        // Tabel detail retur
        $detail_retur = "CREATE TABLE IF NOT EXISTS detail_retur (
            iddetail_retur INT AUTO_INCREMENT PRIMARY KEY,
            jumlah INT,
            alasan VARCHAR(200),
            idretur BIGINT,
            iddetail_penerimaan BIGINT,
            FOREIGN KEY (idretur) REFERENCES retur(idretur),
            FOREIGN KEY (iddetail_penerimaan) REFERENCES detail_penerimaan(iddetail_penerimaan)
        )";
        DB::statement($detail_retur);

        // Tabel kartu stok
        $kartu_stok = "CREATE TABLE IF NOT EXISTS kartu_stok (
            idkartu_stok BIGINT AUTO_INCREMENT PRIMARY KEY,
            jenis_transaksi CHAR(1),
            masuk INT,
            keluar INT,
            stock INT,
            created_at TIMESTAMP,
            idtransaksi BIGINT,
            idbarang INT,
            FOREIGN KEY (idbarang) REFERENCES barang(idbarang)
        )";
        DB::statement($kartu_stok);

        return "Tabel berhasil dibuat!";
    }

    public function insert_data()
    {
        // Pilih database
        DB::statement("USE pbd_uts");

        // Insert data ke tabel roles
        $insert_role = "INSERT INTO role (nama_role) VALUES
                        ('Administrator'),
                        ('Staff'),
                        ('Pengguna')";
        DB::statement($insert_role);

        // Insert data ke tabel satuan
        $insert_satuan = "INSERT INTO satuan (nama_satuan, status) VALUES
                        ('Kg', 1),
                        ('Pcs', 1),
                        ('Ltr', 1)";
        DB::statement($insert_satuan);

        // Insert data ke tabel vendor
        $insert_vendor = "INSERT INTO vendor (nama_vendor, badan_hukum, status) VALUES
                        ('UD. DJARUM', 'B', 'A'),
                        ('PIC. Polima', 'C', 'A'),
                        ('PC. Serimpit', 'D', 'A')";
        DB::statement($insert_vendor);

        // Insert data ke tabel barang
        $insert_barang = "INSERT INTO barang (jenis, nama, idsatuan, status, harga) VALUES
                        ('A', 'Beras', 1, 1, 35000),
                        ('B', 'Laptop', 2, 1, 7000000),
                        ('C', 'Air galon', 3, 1, 100000)";
        DB::statement($insert_barang);

        // Insert data ke tabel user
        $insert_user = "INSERT INTO user (username, password, idrole) VALUES
                        ('administrasi', '12345678', 1),
                        ('staff', '12345678', 2),
                        ('guest', '12345678', 3)";
        DB::statement($insert_user);

        // Insert data ke tabel margin_penjualan
        $insert_margin_penjualan = "INSERT INTO margin_penjualan (created_at, persen, status, iduser, updated_at) VALUES
                                    (NOW(), 15.5, 1, 1, NOW()),
                                    (NOW(), 10.0, 1, 2, NOW())";
        DB::statement($insert_margin_penjualan);

        return "Data berhasil di-insert ke database!";
    }


}
