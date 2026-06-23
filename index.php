<?php
// index.php

// 1. Ambil semua file dependensi yang dibutuhkan
require_once 'koneksi.php';
require_once 'KaryawanKontrak.php';
require_once 'KaryawanTetap.php';
require_once 'KaryawanMagang.php';

// 2. Inisialisasi Koneksi Database Menggunakan PDO
$host = "localhost";
$username = "root";
$password = "";
$db_name = "db_latihan_uaspbo_trpl1b_muhammadagungwiranata";

try {
    $db = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

// 3. Ambil data dari tabel_karyawan
$query = "SELECT * FROM tabel_karyawan";
$stmt = $db->prepare($query);
$stmt->execute();

// Tempat menampung objek berdasarkan kelompok jenis karyawan
$kelompok_karyawan = [
    'Kontrak' => [],
    'Tetap'   => [],
    'Magang'  => []
];

// 4. Proses Mapping data Relasional Database menjadi Objek OOP (Polimorfisme)
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $jenis = $row['jenis_karyawan'];
    
    if ($jenis == 'Kontrak') {
        $kelompok_karyawan['Kontrak'][] = new KaryawanKontrak(
            $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], 
            $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'],
            $row['durasi_kontrak_bulan'], $row['agensi_penyalur']
        );
    } elseif ($jenis == 'Tetap') {
        $kelompok_kamar_karyawan = $kelompok_karyawan['Tetap'][] = new KaryawanTetap(
            $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], 
            $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'],
            $row['tunjangan_kesehatan'], $row['opsi_saham_id']
        );
    } elseif ($jenis == 'Magang') {
        $kelompok_karyawan['Magang'][] = new KaryawanMagang(
            $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], 
            $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'],
            $row['uang_saku_bulanan'], $row['sertifikat_kampus_merdeka']
        );
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Penggajian Karyawan - View PHP</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f6f9; }
        h1 { color: #333; text-align: center; margin-bottom: 30px; }
        h2 { color: #2c3e50; margin-top: 40px; border-bottom: 2px solid #2c3e50; padding-bottom: 5px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; background: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { padding: 12px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #2c3e50; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .harga { text-align: right; font-weight: bold; color: #27ae60; }
    </style>
</head>
<body>

    <h1>Sistem Antarmuka Manajemen & Slip Gaji Karyawan</h1>

    <?php foreach ($kelompok_karyawan as $jenis_karyawan => $daftar_karyawan): ?>
        <h2>Kategori Status: Karyawan <?= $jenis_karyawan ?></h2>
        
        <?php if (empty($daftar_karyawan)): ?>
            <p>Tidak ada data karyawan untuk kategori ini.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID Karyawan</th>
                        <th>Nama Karyawan</th>
                        <th>Departemen</th>
                        <th>Hari Masuk</th>
                        <th>Gaji / Hari</th>
                        <th>Spesifikasi Jabatan & Profil (Polimorfik)</th>
                        <th>Gaji Bersih (Polimorfik)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($daftar_karyawan as $karyawan): ?>
                        <tr>
                            <td><?= $karyawan->getIdKaryawan(); ?></td>
                            <td><?= $karyawan->getNamaKaryawan(); ?></td>
                            <td><?= $karyawan->getDepartemen(); ?></td>
                            <td><?= $karyawan->getHariKerjaMasuk(); ?> Hari</td>
                            <td>Rp <?= number_format($karyawan->getGajiDasarPerhari(), 0, ',', '.'); ?></td>
                            <td>
                                <?php $karyawan->tampilkanProfilKaryawan(); ?>
                            </td>
                            <td class="harga">
                                Rp <?= number_format($karyawan->hitungGajiBersih(), 2, ',', '.') ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    <?php endforeach; ?>

</body>
</html>