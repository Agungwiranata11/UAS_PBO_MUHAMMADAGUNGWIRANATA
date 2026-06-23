<?php
// KaryawanKontrak.php
require_once 'koneksi.php';

class KaryawanKontrak extends Karyawan {
    // Properti tambahan spesifik untuk Karyawan Kontrak
    private $durasiKontrakBulan;
    private $agensiPenyalur;

    // Konstruktor kelas anak
    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerhari, $durasiKontrakBulan, $agensiPenyalur) {
        // Memanggil konstruktor dari parent class (Karyawan)
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerhari);
        $this->durasiKontrakBulan = $durasiKontrakBulan;
        $this->agensiPenyalur = $agensiPenyalur;
    }

    // Mengimplementasikan metode abstrak hitungGajiBersih
    public function hitungGajiBersih() {
        // Logika gaji bersih sementara (akan di-override lebih detail di Tahap 5 jika ada ketentuan)
        return $this->hariKerjaMasuk * $this->gajiDasarPerhari;
    }

    // Mengimplementasikan metode abstrak tampilkanProfilKaryawan
    public function tampilkanProfilKaryawan() {
        echo "ID Karyawan : " . $this->id_karyawan . "<br>";
        echo "Nama        : " . $this->nama_karyawan . "<br>";
        echo "Departemen  : " . $this->departemen . "<br>";
        echo "Status      : Kontrak<br>";
        echo "Durasi      : " . $this->durasiKontrakBulan . " Bulan<br>";
        echo "Agensi      : " . $this->agensiPenyalur . "<br>";
    }
}
?>