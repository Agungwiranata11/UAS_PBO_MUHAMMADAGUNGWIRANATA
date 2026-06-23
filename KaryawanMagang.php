<?php
// KaryawanMagang.php
require_once 'koneksi.php';

class KaryawanMagang extends Karyawan {
    // Properti tambahan spesifik untuk Karyawan Magang
    private $uangSakuBulanan;
    private $sertifikatKampusMerdeka;

    // Konstruktor kelas anak
    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerhari, $uangSakuBulanan, $sertifikatKampusMerdeka) {
        // Memanggil konstruktor dari parent class (Karyawan)
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerhari);
        $this->uangSakuBulanan = $uangSakuBulanan;
        $this->sertifikatKampusMerdeka = $sertifikatKampusMerdeka;
    }

    // Mengimplementasikan metode abstrak hitungGajiBersih
    public function hitungGajiBersih() {
        // Magang biasanya akumulasi uang saku bulanan + upah harian kerja
        return ($this->hariKerjaMasuk * $this->gajiDasarPerhari) + $this->uangSakuBulanan;
    }

    // Mengimplementasikan metode abstrak tampilkanProfilKaryawan
    public function tampilkanProfilKaryawan() {
        echo "ID Karyawan : " . $this->id_karyawan . "<br>";
        echo "Nama        : " . $this->nama_karyawan . "<br>";
        echo "Departemen  : " . $this->departemen . "<br>";
        echo "Status      : Magang<br>";
        echo "Uang Saku   : Rp " . number_format($this->uangSakuBulanan, 0, ',', '.') . "<br>";
        echo "Sertifikat  : " . $this->sertifikatKampusMerdeka . "<br>";
    }
}
?>