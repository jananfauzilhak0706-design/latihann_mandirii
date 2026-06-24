<?php
// Panggil file pendaftaran.php
require_once 'pendaftaran.php';

// SUBCLASS: PendaftaranReguler
class PendaftaranReguler extends Pendaftaran {
    // Properti Tambahan Spesifik Anak (Private)
    private $pilihanProdi;
    private $lokasiKampus;

    public function __construct($dataRow) {
        // Teruskan data global ke constructor class induk (Pendaftaran)
        parent::__construct($dataRow);
        
        // Pemetaan atribut spesifik dari kolom database
        $this->pilihanProdi = isset($dataRow['pilihan_prodi']) ? $dataRow['pilihan_prodi'] : '-';
        $this->lokasiKampus = isset($dataRow['lokasi_kampus']) ? $dataRow['lokasi_kampus'] : '-';
    }

    /**
     * Metode Query Spesifik untuk Jalur Reguler
     * @param mysqli $db - Objek koneksi database
     * @return array - Kumpulan objek PendaftaranReguler
     */
    public static function getDaftarReguler($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Reguler'";
        $result = $db->query($query);
        
        $kumpulanObjek = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Mengubah baris database menjadi objek nyata dari kelas ini sendiri
                $kumpulanObjek[] = new self($row);
            }
        }
        return $kumpulanObjek;
    }

    // Mengimplementasikan abstract method untuk menghitung biaya
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar;
    }

    // Mengimplementasikan abstract method untuk menampilkan info unik
    public function tampilkanInfoJalur() {
        echo "<strong>— Karakteristik Jalur Reguler —</strong><br>";
        echo "Pilihan Prodi  : " . $this->pilihanProdi . "<br>";
        echo "Lokasi Kampus  : " . $this->lokasiKampus . "<br>";
    }
}