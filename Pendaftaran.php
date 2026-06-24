<?php

// Menggunakan kata kunci 'abstract' sebagai blueprint utama
abstract class Pendaftaran {
    
    // Properti Terenkapsulasi (protected)
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar;

    /**
     * Constructor untuk memetakan (mapping) nilai properti dari database
     */
    public function __construct($dataRow) {
        $this->id_pendaftaran        = isset($dataRow['id_pendaftaran']) ? $dataRow['id_pendaftaran'] : null;
        $this->nama_calon            = isset($dataRow['nama_calon']) ? $dataRow['nama_calon'] : '-';
        $this->asal_sekolah          = isset($dataRow['asal_sekolah']) ? $dataRow['asal_sekolah'] : '-';
        $this->nilai_ujian            = isset($dataRow['nilai_ujian']) ? $dataRow['nilai_ujian'] : 0;
        $this->biayaPendaftaranDasar = isset($dataRow['biaya_pendaftaran_dasar']) ? $dataRow['biaya_pendaftaran_dasar'] : 0;
    }

    abstract public function hitungTotalBiaya();
    abstract public function tampilkanInfoJalur(); 

    /**
     * Metode reguler untuk mencetak informasi data dasar pendaftar
     */
    public function infoDasarPendaftar() {
        echo "<strong>ID Pendaftaran:</strong> " . $this->id_pendaftaran . "<br>";
        echo "<strong>Nama Calon:</strong> " . $this->nama_calon . "<br>";
        echo "<strong>Asal Sekolah:</strong> " . $this->asal_sekolah . "<br>";
        echo "<strong>Nilai Ujian:</strong> " . $this->nilai_ujian . "<br>";
        echo "<strong>Biaya Dasar:</strong> Rp " . number_format($this->biayaPendaftaranDasar, 0, ',', '.') . "<br>";
    }
}