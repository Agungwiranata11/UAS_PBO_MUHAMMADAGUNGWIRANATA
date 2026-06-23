<?php
// KaryawanTetap.php
require_once 'koneksi.php';

class KaryawanTetap extends Karyawan {
    // Properti tambahan spesifik untuk Karyawan Tetap
    private $tunjanganKesehatan;
    private $opsiSahamId;

    // Konstruktor kelas anak
    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerhari, $tunjanganKesehatan, $opsiSahamId) {
        // Memanggil konstruktor dari parent class (Karyawan)
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerhari);
        $this->tunjanganKesehatan = $tunjanganKesehatan;
        $this->opsiSahamId = $opsiSahamId;
    }

    // Mengimplementasikan metode abstrak hitungGajiBersih
    public function hitungGajiBersih() {
        return ($this->hariKerjaMasuk * $this->gajiDasarPerhari) + $this->tunjanganKesehatan;
    }

    // Mengimplementasikan metode abstrak tampilkanProfilKaryawan
    public function tampilkanProfilKaryawan() {
        echo "ID Karyawan : " . $this->id_karyawan . "<br>";
        echo "Nama        : " . $this->nama_karyawan . "<br>";
        echo "Departemen  : " . $this->departemen . "<br>";
        echo "Status      : Tetap<br>";
        echo "Tunjangan   : Rp " . number_format($this->tunjanganKesehatan, 0, ',', '.') . "<br>";
        echo "Opsi Saham  : " . $this->opsiSahamId . "<br>";
    }
}
?>