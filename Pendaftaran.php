<?php

// Menggunakan kata kunci 'abstract' sebagai blueprint utama
abstract class Pendaftaran {
    
    // 3. Properti/Atribut Terenkapsulasi (protected)
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar; // Menggunakan camelCase sesuai instruksi

    /**
     * Constructor untuk memetakan (mapping) nilai properti secara dinamis
     * dari baris/kolom tabel database (Tahap 1)
     * * @param array $dataRow - Berisi satu baris data hasil fetch_assoc() database
     */
    public function __construct($dataRow) {
        $this->id_pendaftaran        = isset($dataRow['id_pendaftaran']) ? $dataRow['id_pendaftaran'] : null;
        $this->nama_calon            = isset($dataRow['nama_calon']) ? $dataRow['nama_calon'] : '-';
        $this->asal_sekolah          = isset($dataRow['asal_sekolah']) ? $dataRow['asal_sekolah'] : '-';
        $this->nilai_ujian            = isset($dataRow['nilai_ujian']) ? $dataRow['nilai_ujian'] : 0;
        $this->biayaPendaftaranDasar = isset($dataRow['biaya_pendaftaran_dasar']) ? $dataRow['biaya_pendaftaran_dasar'] : 0;
    }

    /**
     * Metode Abstrak wajib yang harus diimplementasikan oleh setiap subclass (kelas anak)
     */
    abstract public function hitungTotalBiaya();
    abstract public function tampilkanInfoJalur(); 

    /**
     * Metode regular untuk mencetak informasi data dasar pendaftar pada halaman web
     */
    public function infoDasarPendaftar() {
        echo "<strong>ID Pendaftaran:</strong> " . $this->id_pendaftaran . "<br>";
        echo "<strong>Nama Calon:</strong> " . $this->nama_calon . "<br>";
        echo "<strong>Asal Sekolah:</strong> " . $this->asal_sekolah . "<br>";
        echo "<strong>Nilai Ujian:</strong> " . $this->nilai_ujian . "<br>";
        echo "<strong>Biaya Dasar:</strong> Rp " . number_format($this->biayaPendaftaranDasar, 0, ',', '.') . "<br>";
    }
}