<?php
// KaryawanKontrak.php
require_once 'koneksi.php';

class KaryawanKontrak extends Karyawan {
    private $durasiKontrakBulan;
    private $agensiPenyalur;

    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerhari, $durasiKontrakBulan, $agensiPenyalur) {
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerhari);
        $this->durasiKontrakBulan = $durasiKontrakBulan;
        $this->agensiPenyalur = $agensiPenyalur;
    }

    // TAHAP 5: Method Overriding untuk Karyawan Kontrak
    public function hitungGajiBersih() {
        return $this->hariKerjaMasuk * $this->gajiDasarPerhari;
    }

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