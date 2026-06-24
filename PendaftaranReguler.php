<?php
// Panggil file pendaftaran.php
require_once 'pendaftaran.php';

// SUBCLASS: PendaftaranReguler
class PendaftaranReguler extends Pendaftaran {
    // Properti Spesifik Anak (Private)
    private $pilihanProdi;
    private $lokasiKampus;

    public function __construct($dataRow) {
        parent::__construct($dataRow);
        
        // Petakan data spesifik reguler dari kolom database
        $this->pilihanProdi = isset($dataRow['pilihan_prodi']) ? $dataRow['pilihan_prodi'] : '-';
        $this->lokasiKampus = isset($dataRow['lokasi_kampus']) ? $dataRow['lokasi_kampus'] : '-';
    }

    /**
     * Metode Query Spesifik untuk Jalur Reguler
     */
    public static function getDaftarReguler($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Reguler'";
        $result = $db->query($query);
        
        $kumpulanObjek = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $kumpulanObjek[] = new self($row);
            }
        }
        return $kumpulanObjek;
    }

    /**
     * [Tahap 5] Overriding: Menghitung total biaya untuk Jalur Reguler
     * Total Biaya = biayaPendaftaranDasar
     */
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar;
    }

    /**
     * Overriding: Menampilkan karakteristik spesifik jalur Reguler
     */
    public function tampilkanInfoJalur() {
        echo "<strong>— Karakteristik Jalur Reguler —</strong><br>";
        echo "Pilihan Prodi  : " . $this->pilihanProdi . "<br>";
        echo "Lokasi Kampus  : " . $this->lokasiKampus . "<br>";
    }
}