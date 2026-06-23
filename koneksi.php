<?php
// koneksi.php

// 1. Deklarasi abstract class bernama Karyawan
abstract class Karyawan {
    
    // 2. Properti/Atribut Terenkapsulasi dengan hak akses protected
    protected $id_karyawan;
    protected $nama_karyawan;
    protected $departemen; // Memperbaiki typo dari 'dapartemen'
    protected $hariKerjaMasuk;
    protected $gajiDasarPerhari;

    // Konstruktor untuk menginisialisasi atribut global/induk
    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerhari) {
        $this->id_karyawan = $id_karyawan;
        $this->nama_karyawan = $nama_karyawan;
        $this->departemen = $departemen;
        $this->hariKerjaMasuk = $hariKerjaMasuk;
        $this->gajiDasarPerhari = $gajiDasarPerhari;
    }

    // 3. Metode Abstract (Tanpa isi/body) yang wajib diimplementasikan oleh kelas anak
    abstract public function hitungGajiBersih();
    abstract public function tampilkanProfilKaryawan();
    // Tambahkan ini di dalam class Karyawan di file koneksi.php
    public function getIdKaryawan() { return $this->id_karyawan; }
    public function getNamaKaryawan() { return $this->nama_karyawan; }
    public function getDepartemen() { return $this->departemen; }
    public function getHariKerjaMasuk() { return $this->hariKerjaMasuk; }
    public function getGajiDasarPerhari() { return $this->gajiDasarPerhari; }
}
?>